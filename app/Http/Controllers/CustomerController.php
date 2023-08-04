<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     //get current user in session
    //     $user = session()->get('user');
    //     if (!$user) {
    //         return redirect('/login');
    //     }
    // }
    
    public function index(Request $request)
    {

        return view('other.danhSachKhachHang');
    }


    public function create()
    {
        return view('create-customer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'string|max:20',
            'routeId' => 'numeric',
            // 'code' => 'required|string|max:255',
            // 'tax_code' => 'string|max:255',
            // 'email' => 'string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            //quận, huyện
            'guide' => 'required|string|max:255',
            //xã, phường
            'address' => 'required|string|max:255',
            // 'personContact' => 'string|max:255',
            // 'person_anotherName' => 'string|max:255',
            // 'person_phoneNumber' => 'string|max:255',
            // 'person_email' => 'string|'
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
}
