<?php

namespace App\Http\Controllers;

use App\Models\PersonnelLevel;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PersonnelLevelController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        if (strlen($search) >= 50) {
            $search = substr($search, 0, 47);
            $search = $search.'...';
        }
        $personnelLevelList = PersonnelLevel::where("personnel_level.code", "like", "%$search%")->orWhere("personnel_level.name", "like", "%$search%")->paginate(10);
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        return view("cap_nhan_su.index",[
            "personnelLevelList"=>$personnelLevelList,
            "departmentListTree"=>$departmentListTree,
            'search' => $search
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description  = $request->get('description');
        $data = new PersonnelLevel();
        $data->name = $name;
        $data->code=$code;
        $data->description=$description;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('PersonnelLevel.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description  = $request->get('description');
        $data = PersonnelLevel::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->description=$description;
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('PersonnelLevel.index');
    }

    public function destroy($id)
    {
        PersonnelLevel::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        PersonnelLevel::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
        ;
    }

}
