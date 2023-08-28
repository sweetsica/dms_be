<?php

namespace App\Http\Controllers;

use App\Models\TechnicalSpecificationsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        Session::flash('success', 'Thêm mới thành công');
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
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('TechnicalSpecificationsGroup.index');
    }

    public function destroy($id)
    {
        TechnicalSpecificationsGroup::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        TechnicalSpecificationsGroup::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();

    }

}
