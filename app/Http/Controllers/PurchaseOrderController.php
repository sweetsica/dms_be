<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\PurchaseOrder;
use App\Models\Personnel;
use App\Models\RouteDirection;
use App\Models\Customer;
use App\Models\Department;
use Laminas\Code\Generator\EnumGenerator\Cases\PureCases;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PurchaseOrdersExport;
use App\Models\Promotion;


class PurchaseOrderController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $limit = 10;
        $query = PurchaseOrder::query();
        $trang_thai = $request->query('trang_thai');
        $nguoi_dat = $request->query('nguoi_dat');
        $thoi_gian = $request->query('thoi_gian');
        // $positionList = Position::s
        $query->leftJoin('customers', 'customers.id', '=', 'purchase_orders.customer_id')
        ->select(
            'purchase_orders.id',
            'purchase_orders.group_id',
            'purchase_orders.order_staff',
            'purchase_orders.route_direction',
            'purchase_orders.customer_id',
            'purchase_orders.description',
            'purchase_orders.data',
            'purchase_orders.status',
            'purchase_orders.code',
            'purchase_orders.total_money',
            'purchase_orders.edit_order',
            'purchase_orders.created_at',
            'purchase_orders.updated_at',
            'customers.name as customers_name',
        );
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        if($search != NULL) {
            $query->where("customers.name", "like", "%$search%");
        }    
        
        if($trang_thai == "all")
        {
            $trang_thai = null;
        }

        if($nguoi_dat == "all")
        {
            $nguoi_dat = null;
        }

        if ($trang_thai != NULL) {
            $query->where('purchase_orders.status', $trang_thai);
        }
        

        if ($thoi_gian != NULL) {
            $query->where('purchase_orders.created_at', "like", "%$thoi_gian%");
                    // ->orWhere('purchase_orders.updated_at', "like", "%$thoi_gian%");
        }

        if ($nguoi_dat != NULL) {
            $query->where('purchase_orders.order_staff', $nguoi_dat);
        }

        

        $purchaseOrderList = $query->orderByDesc('id')->paginate($limit);

        
        // dd($purchaseOrderList);
        $pagination = $this->pagination($purchaseOrderList);
        // dd($purchaseOrderList);
        $listUsers = Personnel::all();
        $listCustomers = Customer::all();
        $listRouteDirections = RouteDirection::all();
        $listGroups = Department::where('id', '=', '4')->orWhere('parent', '=', '4')->orWhere('id', '=', '5')->orWhere('parent', '=', '5')->get();
        return view("PurchaseOrder.index",[
            'purchaseOrderList'=>$purchaseOrderList,
            'listUsers'=>$listUsers,
            'listCustomers'=>$listCustomers,
            'listRouteDirections'=>$listRouteDirections,
            'listGroups'=>$listGroups,
            'search' => $search,
            'pagination' => $pagination,       

        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group_id = $request->get('group_id');
        $order_staff = $request->get('order_staff');
        $route_direction = $request->get('route_direction');
        $customer_id = $request->get('customer_id');
        $description = $request->get('description');
        $status = 0;
        $code = $request->get('code');

        $data = new PurchaseOrder();
        $data->group_id = $group_id;
        $data->order_staff = $order_staff;
        $data->route_direction = $route_direction;
        $data->customer_id = $customer_id;
        $data->description = $description;
        $data->status = $status;
        $data->code = $code;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('PurchaseOrder.show', $data->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_detail = PurchaseOrder::find($id);
        $promotion = Promotion::all();
        return view('PurchaseOrder.chiTietDonHang')->with('order_detail', $order_detail)
                                                   ->with('promotion', $promotion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group_id = $request->get('group_id');
        $order_staff = $request->get('order_staff');
        $route_direction = $request->get('route_direction');
        $customer_id = $request->get('customer_id');
        $description = $request->get('description');
        $edit_order = $request->get('edit_order');

        $data = PurchaseOrder::find($id);
        $data->group_id = $group_id;
        $data->order_staff = $order_staff;
        $data->route_direction = $route_direction;
        $data->customer_id = $customer_id;
        $data->description = $description;
        $data->edit_order = $edit_order;
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PurchaseOrder::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        PurchaseOrder::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return back();

    }

    public function export()
    {             
        $now = now();  
        return Excel::download(new PurchaseOrdersExport, 'Danh-sach-don-dat-hang-'.$now.'.xlsx');
        
    }
}
