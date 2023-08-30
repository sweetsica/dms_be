<?php

namespace App\Http\Controllers;

use App\Models\Specifications;
use App\Models\TechnicalSpecificationsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpecificationsController extends Controller
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
        $pagination = $this->pagination($SpecificationsList);
        return view('thong_so_ky_thuat.index', [
            'search' => $search,
            'SpecificationsList'=>$SpecificationsList,
            'TechnicalSpecificationsGroupList'=>$TechnicalSpecificationsGroupList,
            'pagination'=>$pagination,
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
        Session::flash('success', 'Thêm mới thành công');
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
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('Specifications.index');
    }

    public function destroy($id)
    {
        Specifications::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Specifications::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();

    }
}
