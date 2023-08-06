<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Locality;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonnelController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $personnelList = Personnel::leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            )
            ->where("personnel.code", "like", "%$search%")->paginate(5);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.index",[
            "personnelList"=>$personnelList,
            "departmentlists"=>$departmentlists,
            "positionlists"=>$positionlists,
            "localityList"=>$localityList,
            "personnellists"=>$personnellists,
            "personnelLevelList"=>$personnelLevelList,
            "roleList"=>$roleList,
            "departmentListTree"=>$departmentListTree,
            'search' => $search
        ]);
    }

    public function getPersonnel()
    {
        $personnel = Personnel::orderBy('id', 'DESC')->get();
        $personnellists = [];
        Personnel::recursive($personnel, $manages = 0, $level = 1, $personnellists);
        return $personnellists;
    }

    public function getDepartment()
    {
        $department = Department::orderBy('id', 'DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0, $level = 1, $departmentlists);
        return $departmentlists;
    }

    public function getPosition()
    {
        $position = Position::orderBy('id', 'DESC')->get();
        $positionlists = [];
        Position::recursive($position, $parents = 0, $level = 1, $positionlists);
        return $positionlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $department_id = $request->get('department_id');
        $position_id = $request->get('position_id');
        $personnel_lv_id = $request->get('personnel_lv_id');
        $role_id = $request->get('role_id');
        $area_id = $request->get('area_id');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $working_form = $request->get('working_form');
        $status = $request->get('status');
        $password = $request->get('password');
        $birthday = $request->get('birthday');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $annual_salary = $request->get('annual_salary');
        $pack = $request->get('pack');
        $manage = $request->get('manage');
        $data = new Personnel();
        $data->name = $name;
        $data->department_id = $department_id;
        $data->code = $code;
        $data->position_id = $position_id;
        $data->department_id = $department_id;
        $data->personnel_lv_id = $personnel_lv_id;
        $data->pack = $pack;
        $data->role_id = $role_id;
        $data->area_id = $area_id;
        $data->email = $email;
        $data->phone = $phone;
        $data->working_form = $working_form;
        $data->status = $status;
        $data->password = Hash::make($password);
        $data->birthday = $birthday;
        $data->address = $address;
        $data->annual_salary = $annual_salary;
        $data->gender = $gender;
        $data->manage = $manage;
        $data->save();
        return redirect()->route('Personnel.index');
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $department_id = $request->get('department_id');
        $position_id = $request->get('position_id');
        $personnel_lv_id = $request->get('personnel_lv_id');
        $role_id = $request->get('role_id');
        $area_id = $request->get('area_id');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $working_form = $request->get('working_form');
        $status = $request->get('status');
        $password = $request->get('password');
        $birthday = $request->get('birthday');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $annual_salary = $request->get('annual_salary');
        $pack = $request->get('pack');
        $manage = $request->get('manage');
        $data = Personnel::find($id);
        $data->name = $name;
        $data->department_id = $department_id;
        $data->code = $code;
        $data->position_id = $position_id;
        $data->department_id = $department_id;
        $data->personnel_lv_id = $personnel_lv_id;
        $data->pack = $pack;
        $data->role_id = $role_id;
        $data->area_id = $area_id;
        $data->email = $email;
        $data->phone = $phone;
        $data->working_form = $working_form;
        $data->status = $status;
        $data->password = Hash::make($password);
        $data->birthday = $birthday;
        $data->address = $address;
        $data->annual_salary = $annual_salary;
        $data->gender = $gender;
        $data->manage = $manage;
        $data->save();
        return redirect()->route('Personnel.index');
    }

    public function destroy($id)
    {
        Personnel::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa !');
        ;
    }

    public function view()
    {
        $personnelList = Personnel::all();
        return $personnelList;
    }
}