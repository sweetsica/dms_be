<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use LDAP\Result;
use Illuminate\Support\Facades\Session;


class CustomerGroupController extends Controller
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
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        $CustomerGroupList = CustomerGroup::where("customer_group.code", "like", "%$search%")->paginate(1);

        // $positionListTree = Position::where('parent', 0)->with('donViCon')->get();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        $departmentListTree = $departmentListTree->sortBy('order');
        return view('nhom_khach_hang.index', [
            'search' => $search,
            'customerGroupList'=>$CustomerGroupList,
            'departmentListTree'=> $departmentListTree,
        ]);
    }

    public function store(Request $request){
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $data = new CustomerGroup();
        $data->name = $name;
        $data->code = $code;
        $data->description = $description;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('CustomerGroup.index');
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');
        $data = CustomerGroup::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->description = $description;
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return redirect()->route('CustomerGroup.index');
    }

    public function destroy($id)
    {
        CustomerGroup::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

}
