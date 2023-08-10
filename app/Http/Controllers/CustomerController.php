<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Personnel;
use App\Models\Product;
use App\Models\RouteDirection;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
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

    public function show($id)
    {
        $customer = Customer::with('channel', 'route', 'person')->findOrFail($id);
        return view('other.chiTietKhachHang')->with(compact(
            "customer"
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // 'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'string|max:20',
            'email' => 'string|max:255',
            'routeId' => 'numeric',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'guide' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'personContact' => 'string|max:255',
            'personName' => 'string|max:255',
            'personPhoneNumber' => 'string|max:255',
            'personEmail' => 'string|max:255',
            'hrManager' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'customerChanel' => 'required|string|max:255'
        ]);
    }

    public function view(Request $request)
    {
        try {
            $q = $request->query('q');
            $limit = 30;
            $listData = Customer::query()->with('channel', 'route', 'person');
            if ($q) {
                $listData = $listData->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%');
            }
            switch (session('user')['role_id']) {
                case 3:
                    $listData = $listData->whereHas('person', function ($query) {
                        $query->where('department_id', '=', session('user')['department_id']);
                    });
                    break;

                case 2:
                    $listData = $listData->where('personId', session('user')['id']);
                    break;
            }
            $listData = $listData->paginate($limit);

            $groupIDs = $listData->pluck('groupId')->toArray();
            $listPerson = Personnel::all();
            $listProduct = Product::all();
            $listRoute = RouteDirection::all();
            $listChannel = Department::all();

            $pagination = $this->pagination($listData);

            return view('Customer.danhSachKhachHang', compact(
                'listData',
                'listPerson',
                'listProduct',
                'listRoute',
                'listChannel',
                "pagination"
            ));
        } catch (Exception $e) {
            Session::flash('error', $e);
            return back();
        }
    }

    public function create(Request $request)
    {
        try {

            $data = $request->validate([
                'code' => 'required|unique:customers,code',
            ]);
            // dd($request);
            $code = $data['code'];
            $name = $request->get('name');
            $phone = $request->get('phone');
            $email = $request->get('email');
            $companyName = $request->get('companyName');
            $personContact = $request->get('personContact');
            $career = $request->get('career');
            $taxCode = $request->get('taxCode');
            $companyPhoneNumber = $request->get('companyPhoneNumber');
            $companyEmail = $request->get('companyEmail');
            $accountNumber = $request->get('accountNumber');
            $bankOpen = $request->get('bankOpen');
            $city = $request->get('city');
            $district = $request->get('district');
            $guide = $request->get('guide');
            $address = $request->get('address');
            $personId = session('user')['id'];
            $productId = $request->get('productId');
            $groupId = $request->get('groupId');
            $chanelId = $request->get('chanelId');
            $routeId = $request->get('routeId');
            $status = $request->get('status');
            $data = new Customer();
            $data->code = $code;
            $data->name = $name;
            $data->phone = $phone;
            $data->email = $email;
            $data->companyName = $companyName;
            $data->personContact = $personContact;
            $data->career = $career;
            $data->taxCode = $taxCode;
            $data->companyPhoneNumber = $companyPhoneNumber;
            $data->companyEmail = $companyEmail;
            $data->accountNumber = $accountNumber;
            $data->bankOpen = $bankOpen;
            $data->city = $city;
            $data->district = $district;
            $data->guide = $guide;
            $data->address = $address;
            $data->personId = $personId;
            $data->productId = json_encode($productId);
            $data->group = $groupId;
            $data->chanelId = $chanelId;
            $data->routeId = $routeId;
            $data->status = $status;
            $data->save();
            $listData = Customer::all();
            return redirect()->route('customers', compact('listData'));
            // return view('customer.danhSachKhachHang', compact('listData'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $companyName = $request->get('companyName');
        $personContact = $request->get('personContact');
        $career = $request->get('career');
        $taxCode = $request->get('taxCode');
        $companyPhoneNumber = $request->get('companyPhoneNumber');
        $companyEmail = $request->get('companyEmail');
        $accountNumber = $request->get('accountNumber');
        $bankOpen = $request->get('bankOpen');
        $city = $request->get('city');
        $district = $request->get('district');
        $guide = $request->get('guide');
        $address = $request->get('address');
        $personId = $request->get('personId');
        $productId = $request->get('productId');
        $groupId = $request->get('groupId');
        $chanelId = $request->get('chanelId');
        $routeId = $request->get('routeId');
        $status = $request->get('status');
        $data = Customer::find($id);
        $data->name = $name;
        $data->phone = $phone;
        $data->email = $email;
        $data->companyName = $companyName;
        $data->personContact = $personContact;
        $data->career = $career;
        $data->taxCode = $taxCode;
        $data->companyPhoneNumber = $companyPhoneNumber;
        $data->companyEmail = $companyEmail;
        $data->accountNumber = $accountNumber;
        $data->bankOpen = $bankOpen;
        $data->city = $city;
        $data->district = $district;
        $data->guide = $guide;
        $data->address = $address;
        $data->personId = $personId;
        $data->productId = json_encode($productId);
        $data->group = $groupId;
        $data->chanelId = $chanelId;
        $data->routeId = $routeId;
        $data->status = $status;
        $data->save();
        $listData = Customer::all();
        return redirect()->route('customers', compact('listData'));
    }

    public function findById($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json(['success' => true, 'customer' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy khách hàng hoặc có lỗi xảy ra'], 404);
        }
    }

    public function getCustomersByRouteId($id)
    {
        $customers = Customer::where('routeId', $id)->get();
        return response()->json(['success' => true, 'customers' => $customers]);
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');
    }
}
