<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Product;
use App\Models\Promotion;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Exception;



class PromotionController extends Controller
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


public function index() {

    $promotions = Promotion::paginate(15); // Lấy danh sách Promotion

$promotionDetailsArray = [];
if( $promotions){
foreach ($promotions as $promotion) {
    // $promotionDetailsArray = $promotion->promotion_details;
    $promotionDetails = json_decode($promotion->promotion_details, true);
    // $promotionDetailsArray[] = json_decode($promotion->promotion_details, true);
    if ($promotionDetails) {
        $promotionDetailsArray[$promotion->id] = $promotionDetails;
    } else {
        $promotionDetailsArray[$promotion->id] = [];
    }


}
}
// else{
//  $promotionDetails=0;
// }
// dd()

// if ($promotionDetails) {
//     $promotionDetailsArray[$promotion->id] = $promotionDetails;
// } else {
//     $promotionDetailsArray[$promotion->id] = [];
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
        $pagination = $this->pagination($promotions);

        // return view('Promotion.index', compact('promotions', 'customerGroupNames','listgroup','customersList','products','combinedData','customerNames'));
        return view('Promotion.index', compact('promotions', 'customerGroupNames','listgroup','customersList','products','customerNames','promotionDetailsArray','pagination'));
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
        Session::flash('success', 'Thêm mới thành công');
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
        Session::flash('success', 'Sửa thành công');
        return back();
    }

    public function destroy($id)
    {
        Promotion::destroy($id);
        // $selectedItems = $request->input('selected_items', []);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Promotion::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

}
