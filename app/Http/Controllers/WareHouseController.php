<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    public function index() {
        return view('WareHouse.index');
    }
}
