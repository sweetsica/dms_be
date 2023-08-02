<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        return view('DeXuat_XetDuyet.deXuatTheoMau');
    }

    public function show()
    {
        return view('DeXuat_XetDuyet.mauDeXuat.mauDNTT');
    }
}
