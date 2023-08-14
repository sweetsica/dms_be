<?php

namespace App\Http\Controllers;

use App\Models\PersonnelLevel;
use App\Models\Position;
use Illuminate\Http\Request;

class PersonnelLevelController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $personnelLevelList = PersonnelLevel::where("personnel_level.code", "like", "%$search%")->orWhere("personnel_level.name", "like", "%$search%")->paginate(10);
        $departmentListTree = Position::where('parent',0)->with('donViCon')->get();
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
        return redirect()->back()->with('mess', 'Đã xóa !');;
    }
}
