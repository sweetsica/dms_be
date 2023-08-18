<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $roleList = Role::where("role.code", "like", "%$search%")->paginate(5);
        $departmentListTree = Department::where('parent',0)->with('donViCon')->get();
        return view("vai_tro.index",[
            "roleList"=>$roleList,
            "departmentListTree"=>$departmentListTree,
            'search' => $search
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description  = $request->get('description');
        $data = new Role();
        $data->name = $name;
        $data->code=$code;
        $data->description=$description;
        $data->save();
        return redirect()->route('Role.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description  = $request->get('description');
        $data = Role::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->description=$description;
        $data->save();
        return redirect()->route('Role.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa !');;
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Role::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');

    }
}
