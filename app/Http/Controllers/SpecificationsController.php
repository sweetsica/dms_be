<?php

namespace App\Http\Controllers;

use App\Models\Specifications;
use App\Models\TechnicalSpecificationsGroup;
use Illuminate\Http\Request;

class SpecificationsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $SpecificationsList = Specifications::join('technical_specifications_group','technical_specifications_group.id','=','specifications.group_id')
        ->select(
            'specifications.id',
            'specifications.name',
            'specifications.code',
            'specifications.description',
            'specifications.group_id',
            'technical_specifications_group.name as group_name',
        )
        ->where("specifications.code", "like", "%$search%")
        ->orWhere("specifications.name", "like", "%$search%")
        ->orderBy('specifications.id', 'desc')->paginate(10);
        $TechnicalSpecificationsGroupList = TechnicalSpecificationsGroup::all();
        return view('thong_so_ky_thuat.index', [
            'search' => $search,
            'SpecificationsList'=>$SpecificationsList,
            'TechnicalSpecificationsGroupList'=>$TechnicalSpecificationsGroupList,
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $group_id = $request->get('group_id');
        $data = new Specifications();
        $data->name = $name;
        $data->code = $code;
        $data->description = $description;
        $data->group_id = $group_id;
        $data->save();
        return redirect()->route('Specifications.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $group_id = $request->get('group_id');
        $data = Specifications::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->group_id = $group_id;
        $data->description = $description;

        $data->save();
        return redirect()->route('Specifications.index');
    }

    public function destroy($id)
    {
        Specifications::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Specifications::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');

    }
}
