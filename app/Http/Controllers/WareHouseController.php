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
            ->Join('personnel', 'personnel.id', '=', 'ware_houses.manage')

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
                'personnel.name as manage_name',   
            );
        if($search != NULL) {
            $query->where("ware_houses.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("ware_houses.code", "like", "%$search%");
        } 
        // dd($query);
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
        $name = $request->get('code');
        $code  = $request->get('name');
        $classify = $request->get('classify');
        $description  = $request->get('description');
        $address  = $request->get('address');
        $manage  = $request->get('manage');
        $accountant  = $request->get('accountant');       
        $status  = $request->get('status');
        $data = WareHouse::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->classify = $classify;
        $data->description = $description;
        $data->address = $address;
        $data->manage = $manage;
        $data->accountant = $accountant;        
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
