<?php

namespace App\Http\Controllers;

use App\Models\TechnicalSpecificationsGroup;
use Illuminate\Http\Request;

class TechnicalSpecificationsGroupController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $TechnicalSpecificationsGroupList = TechnicalSpecificationsGroup::where("technical_specifications_group.code", "like", "%$search%")->orWhere("technical_specifications_group.name", "like", "%$search%")->paginate(10);
        return view('nhom_thong_so_ky_thuat.index', [
            'search' => $search,
            'TechnicalSpecificationsGroupList'=>$TechnicalSpecificationsGroupList,
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $data = new TechnicalSpecificationsGroup();
        $data->name = $name;
        $data->code = $code;
        $data->description = $description;
        $data->save();
        return redirect()->route('TechnicalSpecificationsGroup.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $data = TechnicalSpecificationsGroup::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->description = $description;
        $data->save();
        return redirect()->route('TechnicalSpecificationsGroup.index');
    }

    public function destroy($id)
    {
        TechnicalSpecificationsGroup::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        TechnicalSpecificationsGroup::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');

    }

}
