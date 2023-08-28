<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use App\Models\Locality;
use App\Models\Personnel;
use App\Models\RouteDirection;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\PersonnelLevel;
use App\Models\Department;


class RouteDirectionController extends Controller
{
    //
    public function pagination($list)
    {
        return [
            'current_page' => $list->currentPage(),
            'data' => $list->items(),
            'first_page_url' => $list->url(1),
            'from' => $list->firstItem(),
            'last_page' => $list->lastPage(),
            'last_page_url' => $list->url($list->lastPage()),
            'links' => $list->toArray()['links'],
            'next_page_url' => $list->nextPageUrl(),
            'path' => $list->url(1),
            'per_page' => $list->perPage(),
            'prev_page_url' => $list->previousPageUrl(),
            'to' => $list->lastItem(),
            'total' => $list->total(),
        ];
    }

    public function view(Request $request)
    {

        try {
            $search = $request->get('search');
            $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
            $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
            $vung = $request->get('vung');
            $q = $request->query('q');
            $diaban = $request->query('diaban');
            $nhansupt = $request->query('nhansupt');
            $limit = 10;
            $listRoute = RouteDirection::query()->with('personnel', 'areas');
            if ($q) {
                if (strlen($q) >= 50) {
                    $q = substr($q, 0, 47);
                    $q = $q.'...';
                }
                $listRoute = $listRoute->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%')
                    ->orWhereHas('personnel', function ($routeQuery) use ($q) {
                        $routeQuery->where('name', 'like', '%' . $q . '%');
                    })
                    ->orWhereHas('areas', function ($routeQuery) use ($q) {
                        $routeQuery->where('name', 'like', '%' . $q . '%');
                    });
            }
            if ($diaban) {
                $listRoute = $listRoute->whereHas('areas', function ($customerQuery) use ($diaban) {
                    $customerQuery->where('name', 'like', '%' . $diaban . '%');
                });
            }
            if ($nhansupt) {
                $listRoute = $listRoute->whereHas('personnel', function ($customerQuery) use ($nhansupt) {
                    $customerQuery->where('name', 'like', '%' . $nhansupt . '%');
                });
            }
            $listRoute = $listRoute->orderByDesc('id')->paginate($limit);

            $listNS = Personnel::all();

            $listLocality = Locality::all();

            $pagination = $this->pagination($listRoute);

            return view('RouteDirection.danhSachTuyen')->with(
                compact(
                    "listRoute",
                    "listLocality",
                    "listNS",
                    "pagination",
                    "areaTree",
                    "search",
                    "departmentListTree"
                )
            );
        } catch (\Exception $e) {
            Session::flash('error', $e);
            return back();
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'code' => 'required|unique:route_directions,code',
                'personId' => 'required',
                'travel_time' => 'required',
                'areaId' => 'required',
                'description' => 'nullable'
            ]);

            $route = RouteDirection::create($data);
            if ($route) {
                Session::flash('success', "Thêm tuyến thành công");
                return back();
            } else {
                Session::flash('error', "Vui lòng thử lại sau!!");
                return back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'code' => 'required',
                'personId' => 'required',
                'travel_time' => 'required',
                'areaId' => 'required',
                'description' => 'nullable'
            ]);

            $route = RouteDirection::findOrFail($id);
            if ($route) {
                $route->update($data);

                Session::flash('success', "Sửa tuyến thành công");
                return back();
            } else {
                Session::flash('error', "Không tìm thấy tuyến!!");
                return back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $route = RouteDirection::findOrFail($id);
        $route->delete();

        Session::flash('success', "Xoá tuyến thành công");
        return redirect()->route('routeDirection.view');
    }

    public function getAll()
    {
        $routeList = RouteDirection::all();
        return $routeList;
    }

    public function getInfo($routeId)
    {
        $route = RouteDirection::find($routeId);
        $routeList = RouteDirection::join('personnel', 'personnel.id', '=', 'route_directions.personId')
            ->join('locality', 'locality.id', '=', 'route_directions.areaId')
            ->select(
                'personnel.name as personnel_name',
                'locality.name as area_name'
            )
            ->where('route_directions.id', '=', $routeId)
            ->get();
        $customers = Customer::where('routeId', '=', $routeId)->get();
        if (!$route) {
            return response()->json(['message' => 'Không tìm thấy thông tin'], 404);
        }
        return view('RouteDirection.detailTuyen', [
            'route' => $route,
            'routeList' => $routeList,
            'customers' => $customers
        ]);
    }

    public function getCoordinatesDirection(Request $request, $routeId)
    {
        $customers = Customer::where('routeId', $routeId)->get();
        if ($customers->isEmpty()) {
            return response()->json(['error' => 'Không tìm thấy khách hàng với routeId cụ thể'], 404);
        }
        $coordinates = [];
        foreach ($customers as $customer) {
            $address = $customer->address;
            $status = $customer->status;
            $encodedAddress = urlencode($address);
            $nominatimUrl = 'https://nominatim.openstreetmap.org/search?q=' . $encodedAddress . '&format=json';
            $response = Http::get($nominatimUrl);
            if ($response->successful()) {
                $jsonData = $response->json();
                if (!empty($jsonData)) {
                    $result = $jsonData[0];
                    $lat = isset($result['lat']) ? (float) $result['lat'] : null;
                    $lon = isset($result['lon']) ? (float) $result['lon'] : null;

                    if ($lat !== null && $lon !== null) {
                        $coordinates[] = ['lat' => $lat, 'lon' => $lon, 'status' => $status];
                    }
                }
            } else {
                return response()->json(['error' => 'Lỗi tìm vị trí'], 500);
            }
        }
        return response()->json($coordinates);
    }
}