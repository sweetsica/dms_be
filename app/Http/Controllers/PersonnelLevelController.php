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
        return redirect()->route('PersonnelLevel.index');
    }

    public function destroy($id)
    {
        PersonnelLevel::destroy($id);
        Session::flash('success', 'Xoá thành công');
        // return redirect()->back()->with('mess', 'Đã xóa !');
        return redirect()->route('PersonnelLevel.index');
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        PersonnelLevel::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');
        ;
    }

}
