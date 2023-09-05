<?php

namespace App\Http\Controllers;

use App\Models\TechnicalSpecificationsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TechnicalSpecificationsGroupController extends Controller
{

    public function pagination($list)
    {
        return [
            'current_page' => $list->currentPage(),
            'data' => $list->items(),
            'first_page_url' => $list->url(1),
            'from' => $list->firstItem(),
            'last_page' => $list->lastPage(),
            'last_page_url' => $list->url($list->lastPage()),
            'links' => $list->toArray()['links'],
            'next_page_url' => $list->nextPageUrl(),
            'path' => $list->url(1),
            'per_page' => $list->perPage(),
            'prev_page_url' => $list->previousPageUrl(),
            'to' => $list->lastItem(),
            'total' => $list->total(),
        ];
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $TechnicalSpecificationsGroupList = TechnicalSpecificationsGroup::where("technical_specifications_group.code", "like", "%$search%")
        ->orWhere("technical_specifications_group.name", "like", "%$search%")->orderBy('id', 'desc')->paginate(10);
        $pagination = $this->pagination($TechnicalSpecificationsGroupList);
        return view('nhom_thong_so_ky_thuat.index', [
            'search' => $search,
            'TechnicalSpecificationsGroupList'=>$TechnicalSpecificationsGroupList,
            'pagination'=>$pagination,
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
