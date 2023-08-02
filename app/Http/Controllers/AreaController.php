<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\UnitLeader;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $areaList = Area::join('unit_leader','unit_leader.id','=','area.ib_lead')->where("area.code", "like", "%$search%")->paginate(5);
        $UnitLeaderList = UnitLeader::all();
        $areaListTree = Area::where('parent',0)->with('donViCon')->get();
        $areaLists = $this->getArea();
        return view("Area.index",[
            "areaList"=>$areaList,
            "areaLists"=>$areaLists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            'areaListTree' => $areaListTree

        ]);
    }

    public function left(){

        $areaList = Area::all();
        $areaLists = $this->getArea();
        // dd($departmentlists);
        return view("template.sidebar.sidebarArea.sidebarLeft",[
            "areaList"=>$areaList,
            "areaLists"=>$areaLists
        ]);
    }

    public function getArea(){
        $area = Area::orderBy('id','DESC')->get();
        $areaLists = [];
        Area::recursive($area, $parents = 0,$level = 1, $areaLists);
        return $areaLists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $parent = $request->get('parent');
        $description  = $request->get('description');
        $data = new Area();
        $data->name = $name;
        $data->parent=$parent;
        $data->description=$description;
        $data->save();
        return redirect()->route('area.index');
    }
}
