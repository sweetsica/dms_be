<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuySupplierController extends Controller
{
    public function index() {
        return view('BuySupplier.index');
    }

    public function show($id) {
        return view('BuySupplier.chiTietPNMNCC');
    }
}
