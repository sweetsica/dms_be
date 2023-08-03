<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $personnelList = Personnel::join('department','department.id','=','personnel.department_id')
        ->join('position','position.id','=','personnel.position_id')
        ->join('personnel_level','personnel_level.id','=','personnel.personnel_lv_id')
        ->select(
            'personnel.id',
            'personnel.name',
            'personnel.code',
            'personnel.email',
            'personnel.phone',
            'personnel.form',
            'personnel.states',
            'department.name as department_name',
            'position.name as position_name',
            'personnel_level.name as personnel_level_name',
            'personnel.role',
            'personnel.area_id'
            // 'personnel.id',
        )
        ->where("personnel.code", "like", "%$search%")->paginate(5);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnelLevelList = PersonnelLevel::all();
        $departmentListTree = Department::where('parent',0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("nhan_su.index",[
            "personnelList"=>$personnelList,
            "departmentlists"=>$departmentlists,
            "positionlists"=>$positionlists,
            "personnelLevelList"=>$personnelLevelList,
            "departmentListTree"=>$departmentListTree,
            'search' => $search
        ]);
    }

    public function getDepartment(){
        $department = Department::orderBy('id','DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0,$level = 1, $departmentlists);
        return $departmentlists;
    }

    public function getPosition(){
        $position = Position::orderBy('id','DESC')->get();
        $positionlists = [];
        Position::recursive($position, $parents = 0,$level = 1, $positionlists);
        return $positionlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code  = $request->get('code');
        $department_id = $request->get('department_id');
        $position_id  = $request->get('position_id');
        $personnel_lv_id  = $request->get('personnel_lv_id');
        $role  = $request->get('role');
        $area_id  = $request->get('area_id');
        $email  = $request->get('email');
        $phone  = $request->get('phone');
        $form  = $request->get('form');
        $states  = $request->get('states');
        $password  = $request->get('password');
        $birthday  = $request->get('birthday');
        $address  = $request->get('address');
        $gender  = $request->get('gender');
        $annual_salary  = $request->get('annual_salary');
        $pack  = $request->get('pack');
        $manage  = $request->get('manage');
        $data = new Personnel();
        $data->name = $name;
        $data->department_id=$department_id;
        $data->code=$code;
        $data->position_id=$position_id;
        $data->department_id=$department_id;
        $data->personnel_lv_id=$personnel_lv_id;
        $data->pack=$pack;
        $data->role=$role;
        $data->area_id=$area_id;
        $data->email=$email;
        $data->phone=$phone;
        $data->form=$form;
        $data->states=$states;
        $data->password=$password;
        $data->birthday=$birthday;
        $data->address=$address;
        $data->annual_salary=$annual_salary;
        $data->gender=$gender;
        $data->manage=$manage;
        $data->save();
        return redirect()->route('Personnel.index');
    }

}
