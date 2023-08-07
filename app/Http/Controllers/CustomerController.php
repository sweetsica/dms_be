<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Personnel;
use App\Models\Product;
use App\Models\RouteDirection;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
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

    public function view()
    {
        $listData = Customer::with('channel', 'route', 'person')->get();
        $groupIDs = $listData->pluck('groupId')->toArray();
        $listPerson = Personnel::all();
        $listProduct = Product::all();
        $listRoute = RouteDirection::all();
        $listChannel = Department::all();

        return view('Customer.danhSachKhachHang', compact('listData', 'listPerson', 'listProduct', 'listRoute', 'listChannel'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $code = $request->get('code');
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
