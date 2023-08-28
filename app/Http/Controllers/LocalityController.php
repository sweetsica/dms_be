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
        $khu_vuc = $request->get('khu_vuc');
        $query = Locality::query();
        $query->join('area','area.id','=','locality.area_id')
        ->select(
            'locality.id',
            'locality.name',
            'locality.description',
            'locality.code',
            'locality.area_id',
            'area.name as area_name'
        );
        if (strlen($search) >= 50) {
            $search = substr($search, 0, 47);
            $search = $search.'...';
        }
        if($search != NULL) {
            $query->where("locality.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("locality.code", "like", "%$search%");
        }
        if($khu_vuc != NULL) {
            $query->where("area.name", "like", "%$khu_vuc%");
        }
        $localityList=$query->paginate(10);
        $area = Area::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        return view("Address.danhSachDiaBan",[
            "localityList"=>$localityList,
            'search' => $search,
            'area' => $area,
            'khu_vuc' => $khu_vuc,
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

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Locality::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');
        ;
    }

}
