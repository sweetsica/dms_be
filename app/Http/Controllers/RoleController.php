<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $roleList = Role::where("role.code", "like", "%$search%")->paginate(5);
        $positionListTree = Position::where('parent',0)->with('donViCon')->get();
        return view("vai_tro.index",[
            "roleList"=>$roleList,
            "positionListTree"=>$positionListTree,
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

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa !');;
    }
}
