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
    // dd($promotions);
    // $jsonCombinedData = $promotions->promotion_details;
    // $combinedData = json_decode($jsonCombinedData);


    $customerNames = [];

    foreach ($promotions as $promotion) {
        $customerIds = json_decode($promotion->customer_group_id);
        // dd($promotion->customer_group_id);

        if ($customerIds) {
            $customers = CustomerGroup::whereIn('id', $customerIds)->get();
        }
        $customerNames[$promotion->id] = $customers->pluck('name')->toArray();
        // dd($customers->pluck('name')->toArray());
    }
        $listgroup = CustomerGroup::all();
        $customersList = Customer::all();
        $products = Product::all();

        return view('Promotion.index', compact('promotions', 'customerNames','listgroup','customersList','products'));
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
        $customer_id = $request->get('customer_id');
        $data = Promotion::find($id);
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
        $data->save();
        // Session::flash('success', 'Sửa thành công');
        return back();
    }

}
