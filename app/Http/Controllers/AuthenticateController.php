<?php

namespace App\Http\Controllers;


use App\Models\Personnel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

   public function login(Request $request){

    $urse = $request->get('email');
    $pass= $request->get('password');


    try {
        $admin = Personnel::where('email',$urse)->where('password',$pass)->firstOrFail();
        $request->session()->put('id',$admin->id);
        $request->session()->put('email', $admin->email);
        // return Redirect::route('department.index');

        return view('other.danh-sach-dieu-khien');
    } catch (Exception $e) {

        return Redirect::route('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
    }
    }
    // public function logout(Request $request){
    //     $request->session()->flush();
    //     return Redirect::route('login');
    // }

}


