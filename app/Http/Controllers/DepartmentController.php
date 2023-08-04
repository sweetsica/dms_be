<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\UnitLeader;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // public function __construct()
    // {
    //     //get current user in session
    //     $user = session()->get('user');
    //     if (!$user) {
    //         return redirect('/login');
    //     }
    // }
    
    public function index(Request $request){
        $search = $request->get('search');
        $departmentList = Department::leftJoin('unit_leader','unit_leader.id','=','department.ib_lead')
        ->select(
            'department.id',
            'department.name',
            'department.description',
            'department.code',
            'department.parent',
            'department.ib_lead',
            'unit_leader.leader_name'
        )
        ->where("department.code", "like", "%$search%")->paginate(10);
        // dd($departmentList);
        $UnitLeaderList = UnitLeader::all();

        $departmentListTree = Department::where('parent',0)->with('donViCon')->get();
        $departmentlists = $this->getDepartment();

        return view("Deparment.index",[
            "departmentList"=>$departmentList,
            "departmentlists"=>$departmentlists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            "departmentListTree"=>$departmentListTree
        ]);
    }

    public function left(){

        $departmentList = Department::whereNull('parent')->with('donViCon')->get();
        // dd($departmentList);
        $departmentlists = $this->getDepartment();
        // dd($departmentlists);
        return view("template.sidebar.sidebarDepartment.sidebarLeft",[
            "departmentList"=>$departmentList,
            "departmentlists"=>$departmentlists
        ]);
    }

    public function getDepartment(){
        $department = Department::orderBy('id','DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0,$level = 1, $departmentlists);
        return $departmentlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $description  = $request->get('description');
        $data = new Department();
        $data->name = $name;
        $data->parent=$parent;
        $data->code = $code;
        $data->ib_lead = $ib_lead;
        $data->description=$description;
        $data->save();
        return redirect()->route('department.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $code = $request->get('code');
        $description  = $request->get('description');
        $data = Department::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->parent=$parent;
        $data->ib_lead = $ib_lead;
        $data->description=$description;
        $data->save();
        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        Department::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');;
    }
}
