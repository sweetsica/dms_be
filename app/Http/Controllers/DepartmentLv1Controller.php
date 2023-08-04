<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentLv1;
use Illuminate\Http\Request;

class DepartmentLv1Controller extends Controller
{
    public function __construct()
    {
        //get current user in session
        $user = session()->get('user');
        if (!$user) {
            return redirect('/login');
        }
    }

    public function index(){

        $departmentLv1List = DepartmentLv1::join('department','department.id','=','department_lv1.department_id')
        ->select(
            'department_lv1.id',
            'department_lv1.name',
            'department_lv1.description',
            'department.name as department_name'
        )->get();
        $departmentList= Department::all();
        return view("Deparment.deparment_lv1",[
            "departmentList"=>$departmentList,
            "departmentLv1List"=>$departmentLv1List,
            // "rank1"=>$rank1
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $description  = $request->get('description');
        $department_id = $request->get('department_id');
        $data = new DepartmentLv1();
        $data->name = $name;
        $data->description=$description;
        $data->department_id=$department_id;
        $data->save();
        return redirect()->route('department_lv1.index');
    }
}
