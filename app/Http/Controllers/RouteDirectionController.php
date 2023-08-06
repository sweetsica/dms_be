<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use App\Models\Personnel;
use App\Models\RouteDirection;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
            $q = $request->query('q');
            $limit = 10;
            $listRoute = RouteDirection::query();
            if ($q) {
                $listRoute = $listRoute->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%');
            }

            $listRoute = $listRoute->with('personnel', 'areas')->orderByDesc('id')->paginate($limit);

            $listNS = Personnel::all();

            $listArea = Area::all();

            $pagination = $this->pagination($listRoute);

            return view('RouteDirection.danhSachTuyen')->with(compact(
                "listRoute",
                "listArea",
                "listNS",
                "pagination"
            ));
        } catch (Exception $e) {
            Session::flash('error', $e);
            return back();
        }
    }

    public function showMap($id)
    {
        return view('map', ['id' => $id]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'code' => 'required|unique:routedirections,code',
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
        return back();
    }
}
