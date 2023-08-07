<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use App\Models\Position;
use Illuminate\Http\Request;
use LDAP\Result;

class CustomerGroupController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');

        $CustomerGroupList = CustomerGroup::where("customer_group.code", "like", "%$search%")->paginate(5);
        $positionListTree = Position::where('parent', 0)->with('donViCon')->get();
        return view('nhom_khach_hang.index', [
            'search' => $search,
            'customerGroupList'=>$CustomerGroupList,
            'positionListTree'=> $positionListTree,
        ]);
    }

    // public function store(Request $request){
    //     $name = $request->get('name');
    //     $code = $request->get('code');
    //     $description = $request->get('description');
    //     $data = new CustomerGroup();
    //     $data->name = $name;
    //     $data->code = $code;
    //     $data->description = $description;
    //     $data->save();
    //     return redirect()->route()
    // }
}
