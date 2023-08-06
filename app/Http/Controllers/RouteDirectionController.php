<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RouteDirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RouteDirectionController extends Controller
{
    //
    public function view()
    {
        $listData = RouteDirection::all();
        return view('RouteDirection.danhSachTuyen', compact('listData'));
    }

    public function showMap($id)
    {
        return view('map', ['id' => $id]);
    }

    public function create(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $personId = $request->get(('personId'));
        $timeTravel = $request->get(('travel_time'));
        $areaId = $request->get('areaId');
        $description = $request->get('area');
        $data = new RouteDirection();
        $data->name = $name;
        $data->code = $code;
        $data->personId = $personId;
        $data->travel_time = $timeTravel;
        $data->areaId = $areaId;
        $data->description = $description;
        $data->save();
        return view('RouteDirection.danhSachTuyen');
    }
    public function delete($id)
    {
        RouteDirection::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');
        ;
    }
}