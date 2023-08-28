<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
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

    public function index(Request $request) {
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');
        $limit = 15;

        $query = Supplier::query();
        // $positionList = Position::s
        $query
        ->select(
            'suppliers.id',
            'suppliers.name',
            'suppliers.code',
            'suppliers.business_areas',
            'suppliers.tax_code',
            'suppliers.representative',
            'suppliers.job_title',
            'suppliers.bank_number',
            'suppliers.bank_name',
            'suppliers.address',
            'suppliers.contact_name',
            'suppliers.contact_phone',
            'suppliers.contact_email',
            'suppliers.debt_limit',
            'suppliers.days_owed',
            'suppliers.status',
        );
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        if($search != NULL) {
            $query->where("suppliers.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("suppliers.code", "like", "%$search%");
        }

        // $supplierList =$query->paginate(15);
        $supplierList = $query->orderByDesc('id')->paginate($limit);
        // dd($supplierList);
        $pagination = $this->pagination($supplierList);


        return view("Supplier.index",[
            'supplierList'=>$supplierList,
            'search' => $search,
            'pagination' => $pagination,       
        ]);

    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code  = $request->get('code');
        $business_areas = $request->get('business_areas');
        $tax_code  = $request->get('tax_code');
        $representative  = $request->get('representative');
        $job_title  = $request->get('job_title');
        $bank_number  = $request->get('bank_number');
        $bank_name  = $request->get('bank_name');
        $address  = $request->get('address');
        $contact_name = $request->get('contact_name');
        $contact_phone = $request->get('contact_phone');
        $contact_email  = $request->get('contact_email');
        $debt_limit  = $request->get('debt_limit');
        $days_owed  = $request->get('days_owed');
        $status  = $request->get('status');
        $data = new Supplier();
        $data->name = $name;
        $data->code = $code;
        $data->business_areas = $business_areas;
        $data->tax_code = $tax_code;
        $data->representative = $representative;
        $data->job_title = $job_title;
        $data->bank_number = $bank_number;
        $data->bank_name = $bank_name;
        $data->address = $address;
        $data->contact_name = $contact_name;
        $data->contact_phone = $contact_phone;
        $data->contact_email = $contact_email;
        $data->debt_limit = $debt_limit;
        $data->days_owed = $days_owed;
        $data->status = $status;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return back();
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code  = $request->get('code');
        $business_areas = $request->get('business_areas');
        $tax_code  = $request->get('tax_code');
        $representative  = $request->get('representative');
        $job_title  = $request->get('job_title');
        $bank_number  = $request->get('bank_number');
        $bank_name  = $request->get('bank_name');
        $address  = $request->get('address');
        $contact_name = $request->get('contact_name');
        $contact_phone = $request->get('contact_phone');
        $contact_email  = $request->get('contact_email');
        $debt_limit  = $request->get('debt_limit');
        $days_owed  = $request->get('days_owed');
        $status  = $request->get('status');
        $data = Supplier::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->business_areas = $business_areas;
        $data->tax_code = $tax_code;
        $data->representative = $representative;
        $data->job_title = $job_title;
        $data->bank_number = $bank_number;
        $data->bank_name = $bank_name;
        $data->address = $address;
        $data->contact_name = $contact_name;
        $data->contact_phone = $contact_phone;
        $data->contact_email = $contact_email;
        $data->debt_limit = $debt_limit;
        $data->days_owed = $days_owed;
        $data->status = $status;
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return back();
    }

    public function destroy($id)
    {
        Supplier::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Supplier::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return back();

    }
}
