<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\Personnel;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WareHousesExport;
use App\Imports\WareHousesImport;
use App\Exports\WareHouseDetailExport;
use Exception;





class WareHouseController extends Controller
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
        $f_classify = $request->get('f_classify');
        $f_manage = $request->get('f_manage');
        $f_accountant = $request->get('f_accountant');
        $f_status = $request->get('f_status');
        $limit = 15;

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
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
            if (preg_match($pattern, $search)) {
                Session::flash('error', 'Lỗi đầu vào khi search');
                return back();
            }
        if($search != NULL) {
            $query->where("ware_houses.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("ware_houses.code", "like", "%$search%");
        } 
        if ($f_classify != NULL) {
            $query->where("ware_houses.classify", "=", "$f_classify");
        }
        if ($f_manage != NULL) {
            $query->where("ware_houses.manage", "=", "$f_manage");
        }
        if ($f_accountant != NULL) {
            $query->where("ware_houses.accountant", "=", "$f_accountant");
        }
        if ($f_status != NULL) {
            $query->where("ware_houses.status", "=", "$f_status");
        }
        // dd($query);
        $wareHouseList = $query->orderByDesc('id')->paginate($limit);
        // dd($wareHouseList);
        $pagination = $this->pagination($wareHouseList);
        // dd($wareHouseList);
        $listUsers = Personnel::all();
        // dd($wareHouseList);
        return view("WareHouse.index",[
            'wareHouseList'=>$wareHouseList,
            'search' => $search,
            'listUsers' => $listUsers,
            'pagination' => $pagination,       
        ]); 
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code  = $request->get('code');
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
        Session::flash('success', 'Thêm mới thành công');
        return back();
    }

    public function show($id) {
        $wareHouse = WareHouse::find($id);
        $listUsers = Personnel::all();
        return view('WareHouse.chiTietKho')
                            ->with('wareHouse', $wareHouse)
                            ->with('listUsers', $listUsers);
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code  = $request->get('code');
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
        Session::flash('success', 'Đã xoá!');
        return back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        WareHouse::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return back();

    }

    public function export()
    {             
        $now = now();  
        return Excel::download(new WareHousesExport, 'Danh-sach-kho-'.$now.'.xlsx');
        
    }

    public function exportDetail()
    {             
        $now = now();
        return Excel::download(new WareHouseDetailExport, 'Chi-tiet-kho-'.$now.'.xlsx');
        
    }

    public function import(Request $request) 
    {
        try 
        {
            $request->validate([
                'file' => 'required|mimes:xlsx,xlx,xlsm,csv,xls|max:2048',
            ]);
    
            Excel::import(new WareHousesImport, $request->file('file')->store('files'));
    
            return back()->with('success', 'Đã nhập dữ liệu từ Excel!');
        }
        catch (Exception $e) {
            return back()->with('error', 'Sai dữ liệu đầu vào. Xin vui lòng kiểm tra và thử lại!');
        }
    }
}
