<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;



class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $query = Supplier::query();
        // $positionList = Position::s
        $query
        ->select(
            'suppliers.id',
            'suppliers.name',
            'suppliers.code',
            'suppliers.business_areas',
            'suppliers.tax_code',
            'suppliers.representative',
            'suppliers.job_title',
            'suppliers.bank_number',
            'suppliers.bank_name',
            'suppliers.address',
            'suppliers.contact_name',
            'suppliers.contact_phone',
            'suppliers.contact_email',
            'suppliers.debt_limit',
            'suppliers.days_owed',
            'suppliers.status',
        );
        if($search != NULL) {
            $query->where("suppliers.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("suppliers.code", "like", "%$search%");
        }        

        $supplierList =$query->paginate(15);
        // dd($supplierList);
        return view("PuchaseOrder.index",[
            'supplierList'=>$supplierList,
            'search' => $search,
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
