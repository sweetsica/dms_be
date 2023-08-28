<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


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
        Session::flash('success', 'Thêm mới thành công');
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
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('Unit.index');
    }

    public function destroy($id)
    {
        Unit::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Unit::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();

    }

}
