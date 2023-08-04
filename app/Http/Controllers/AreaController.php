<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Department;
use App\Models\UnitLeader;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        $areaList = Area::join('department','department.id','=','area.area')
        ->select(
            'area.id',
            'area.name',
            'area.description',
            'area.code',
            'area.area',
            'department.name as department_name'
        )
        ->where("area.code", "like", "%$search%")->paginate(5);
        $department = Department::where('code', 'like', 'VUNG%')->get();
        return view("Address.danhSachKhuVuc",[
            "areaList"=>$areaList,
            'search' => $search,
            'department' => $department,

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

        dd($data);
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
        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        Area::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');;
    }
}
