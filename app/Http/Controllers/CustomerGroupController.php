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

        ]);
    }
}