<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');


        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
      
        return view("Supplier.index", [
            'search' => $search,
            "departmentListTree" => $departmentListTree,
        ]);
    }
}
