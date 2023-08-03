<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return view('create-customer');
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

        if (isset($data['routeId'])) {
            $data['routeId'] = (int) $data['routeId']; // Chuyển giá trị thành kiểu bigInteger
        }
        Customer::create($data);
        $customers = Customer::all();
        return view('view-customer', compact('customers'));
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
}