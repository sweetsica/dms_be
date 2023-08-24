<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\Personnel;

use Illuminate\Support\Facades\Session;

class WareHouseController extends Controller
{
    public function index(Request $request) {

        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');

        $query = WareHouse::query();
        // $positionList = Position::s
        $query
        ->select(
            'ware_houses.id',
            'ware_houses.code',
            'ware_houses.name',
            'ware_houses.classify',
            'ware_houses.description',
            'ware_houses.address',
            'ware_houses.manage',
            'ware_houses.accountant',
            'ware_houses.status',   
        );
        if($search != NULL) {
            $query->where("suppliers.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("suppliers.code", "like", "%$search%");
        }        

        $wareHouseList =$query->paginate(15);
        $listUsers = Personnel::all();
        // dd($wareHouseList);
        return view("WareHouse.index",[
            'wareHouseList'=>$wareHouseList,
            'search' => $search,
            'listUsers' => $listUsers
        ]); 
    }

    public function store(Request $request)
    {
        $name = $request->get('code');
        $code  = $request->get('name');
        $classify = $request->get('classify');
        $description  = $request->get('description');
        $address  = $request->get('address');
        $manage  = $request->get('manage');
        $accountant  = $request->get('accountant');       
        $status  = $request->get('status');
        $data = new WareHouse();
        $data->name = $name;
        $data->code = $code;
        $data->classify = $classify;
        $data->description = $description;
        $data->address = $address;
        $data->manage = $manage;
        $data->accountant = $accountant;        
        $data->status = $status;
        $data->save();
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
        $data = WareHouse::find($id);
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
        WareHouse::destroy($id);
        Session::flash('success', 'Xóa thành công');
        return back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        WareHouse::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Xoá thành công');
        return back();

    }
}
