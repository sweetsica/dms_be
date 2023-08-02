<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        if ($request->session()->has('token')) {
            // return redirect('/');
            return redirect('/danh-sach-dieu-khien');
        }
        return view('login');
    }
}
