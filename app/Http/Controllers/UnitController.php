<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->get('search');
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        $UnitList = Unit::where("unit.code", "like", "%$search%")->orWhere("unit.name", "like", "%$search%")->paginate(10);
        return view('don_vi_tinh.index', [
            'search' => $search,
            'UnitList'=>$UnitList,
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $code = $request->get('code');
        $data = new Unit();
        $data->name = $name;
        $data->code = $code;
        $data->save();
        return redirect()->route('Unit.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $data = Unit::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->save();
        return redirect()->route('Unit.index');
    }

    public function destroy($id)
    {
        Unit::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Unit::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');

    }

}
