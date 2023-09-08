<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Department;
use App\Models\UnitLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AreaController extends Controller
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

    public function index(Request $request){
        $search = $request->get('search');
        $vung = $request->get('vung');
        $query = Area::query();
        $query->join('department','department.id','=','area.area')
        ->select(
            'area.id',
            'area.name',
            'area.description',
            'area.code',
            'area.area',
            'department.name as department_name'
        );
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        if($search != NULL) {
            $query->where("area.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("area.code", "like", "%$search%");
        }
        if($vung != NULL) {
            $query->where("department.name", "like", "%$vung%");
        }
        $areaList =$query->orderBy('area.id', 'desc')->paginate(10);
        // $department = Department::where('code', 'like', 'VUNG%')->get();
        $department = Department::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        $pagination = $this->pagination($areaList);
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        return view("Address.danhSachKhuVuc",[
            "areaList"=>$areaList,
            'search' => $search,
            'department' => $department,
            'vung' => $vung,
            'areaTree' => $areaTree,
            'pagination' => $pagination,
            'departmentListTree' => $departmentListTree
        ]);
    }
    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $area  = $request->get('area');
        $description  = $request->get('description');
        $data = new Area();
        $data->name = $name;
        $data->code=$code;
        $data->area=$area;
        $data->description=$description;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->back();
//        return redirect()->route('area.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $area  = $request->get('area');
        $description  = $request->get('description');
        $data = Area::find($id);
        $data->name = $name;
        $data->code=$code;
        $data->area=$area;
        $data->description=$description;
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        Area::destroy($id);
        // Session::flash('success', 'Đã xoá!');
        // return redirect()->back();
        Session::flash('success', 'Xoá thành công');
        return redirect()->route('area.index');
        return redirect()->back()->with('mess', 'Đã xóa!');
        // Session::flash('success', 'Đã xoá!');
        // return redirect()->back();
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Area::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
        ;
    }
}
