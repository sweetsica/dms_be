<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index() {

    $promotions = Promotion::all(); // Lấy danh sách Promotion
    $promotionDetailsArray = [];
    if( $promotions){
    foreach ($promotions as $promotion) {
        $promotionDetailsArray = $promotion->promotion_details;

    }
}else{
    $promotionDetailsArray=[];
}

if($promotionDetailsArray){
    $combinedData = json_decode($promotionDetailsArray);
}else{
    $combinedData = [];
}

// $promotionDetailsArray = [];
// if( $promotions){
// foreach ($promotions as $promotion) {
//     // $promotionDetailsArray = $promotion->promotion_details;
//     $promotionDetailsArray = json_decode($promotion->promotion_details, true);

// }
// }else{
// $promotionDetailsArray=[];
// }

//  dd($promotionDetailsArray);

    $customerGroupNames = [];
    foreach ($promotions as $promotion) {
        $customerGrIds = json_decode($promotion->customer_group_id);
        // dd($promotion->customer_group_id);
        if ($customerGrIds) {
            $customersGr = CustomerGroup::whereIn('id', $customerGrIds)->get();
        }else{
            $customersGr = [];
        }
        if ( !is_array($customersGr) or count($customersGr) > 0) {
            $customerGroupNames[$promotion->id] = $customersGr->pluck('name')->toArray();
        } else {
            $customerGroupNames[$promotion->id] = []; // hoặc xử lý khác tùy vào trường hợp của bạn
        }

    }

    $customerNames = [];
    foreach ($promotions as $promotion) {
        $customerIds = json_decode($promotion->customer_id);
        // dd($promotion->customer_id);
        if ($customerIds) {
            $customers = Customer::whereIn('id', $customerIds)->get();
        }else{
            $customers = [];
        }
        if ( !is_array($customers) or count($customers) > 0) {
            $customerNames[$promotion->id] = $customers->pluck('name')->toArray();
        } else {
            $customerNames[$promotion->id] = []; // hoặc xử lý khác tùy vào trường hợp của bạn
        }
        // dd($customerNames);

    }

        $listgroup = CustomerGroup::all();
        $customersList = Customer::all();
        $products = Product::all();

        return view('Promotion.index', compact('promotions', 'customerGroupNames','listgroup','customersList','products','combinedData','customerNames'));
        // return view('Promotion.index', compact('promotions', 'customerGroupNames','listgroup','customersList','products','customerNames','promotionDetailsArray'));
    }

    public function store(Request $request) {

        $combinedData = [];
        foreach ($request->promotion_details as $array) {
            if (is_array($array)) {
                $combinedData[] = $array;
            }
        }
        $jsonCombinedData = json_encode($combinedData);

        $name = $request->get('name');
        $code = $request->get('code');
        $promotion_form = $request->get('promotion_form');
        $applicable_date = $request->get('applicable_date');
        $end_date = $request->get('end_date');
        $multiples = $request->get('multiples');
        $status = $request->get('status');
        $customer_type = $request->get('customer_type');
        $customer_id = $request->get('customer_id');
        $data = new Promotion();
        $data->name = $name;
        $data->code = $code;
        $data->promotion_form = $promotion_form;
        $data->applicable_date = $applicable_date;
        $data->end_date = $end_date;
        $data->multiples = $multiples;
        $data->status = $status;
        $data->customer_type = $customer_type;
        $data->customer_id = $customer_id;
        $data->promotion_details  = $jsonCombinedData;

        if ($request->customer_group_id) {
            $data->customer_group_id = json_encode($request->customer_group_id);
        }
        if ($request->customer_id) {
            $data->customer_id = json_encode($request->customer_id);
        }
        $data->save();
        return redirect()->route('Promotion.index');
    }

    public function update(Request $request,$id)
    {
        $combinedData = [];
        foreach ($request->promotion_details as $array) {
            if (is_array($array)) {
                $combinedData[] = $array;
            }
        }
        $jsonCombinedData = json_encode($combinedData);
        $name = $request->get('name');
        $code = $request->get('code');
        $promotion_form = $request->get('promotion_form');
        $applicable_date = $request->get('applicable_date');
        $end_date = $request->get('end_date');
        $multiples = $request->get('multiples');
        $status = $request->get('status');
        $customer_type = $request->get('customer_type');
        // $customer_id = $request->get('customer_id');
        $data = Promotion::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->promotion_form = $promotion_form;
        $data->applicable_date = $applicable_date;
        $data->end_date = $end_date;
        $data->multiples = $multiples;
        $data->status = $status;
        $data->customer_type = $customer_type;
        // $data->customer_id = $customer_id;
        $data->promotion_details  = $jsonCombinedData;
        if ($request->customer_group_id) {
            $data->customer_group_id = json_encode($request->customer_group_id);
        }
        if ($request->customer_id) {
            $data->customer_id = json_encode($request->customer_id);
        }
        $data->save();
        // Session::flash('success', 'Sửa thành công');
        return back();
    }

    public function destroy($id)
    {
        Promotion::destroy($id);
        // $selectedItems = $request->input('selected_items', []);
        return redirect()->back()->with('mess', 'Đã xóa!');;
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Promotion::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

}