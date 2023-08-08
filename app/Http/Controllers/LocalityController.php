<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Department;
use App\Models\Locality;
use Illuminate\Http\Request;

class LocalityController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $localityList = Locality::join('area','area.id','=','locality.area_id')
        ->select(
            'locality.id',
            'locality.name',
            'locality.description',
            'locality.code',
            'locality.area_id',
            'area.name as area_name'
        )
        ->where("locality.code", "like", "%$search%")->paginate(5);
        $area = Area::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        return view("Address.danhSachDiaBan",[
            "localityList"=>$localityList,
            'search' => $search,
            'area' => $area,
            'areaTree' => $areaTree,

        ]);
    }
    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $area_id  = $request->get('area_id');
        $description  = $request->get('description');
        $data = new Locality();
        $data->name = $name;
        $data->code=$code;
        $data->area_id=$area_id;
        $data->description=$description;
        $data->save();
        return redirect()->route('locality.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $area_id  = $request->get('area_id');
        $description  = $request->get('description');
        $data = Locality::find($id);
        $data->name = $name;
        $data->code=$code;
        $data->area_id=$area_id;
        $data->description=$description;
        $data->save();
        return redirect()->route('locality.index');
    }

    public function destroy($id)
    {
        Locality::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');;
    }
}
