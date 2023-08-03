<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        // if ($request->session()->has('token')) {
        //     return redirect('/danh-sach-dieu-khien');
        // }
        return view('login');
    }

    public function loginProcess(Request $request){

        $urse = $request->get('email');
        $pass= $request->get('password');


        try {
            $admin = Personnel::where('name',$urse)->where('pass',$pass)->firstOrFail();
            $request->session()->put('id',$admin->id);
            $request->session()->put('email', $admin->email);
            return Redirect::route('dashboard');


        }
            catch (Exception $e) {
                return Redirect::route('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
            }
        }
        public function logout(Request $request){
            $request->session()->flush();
            return Redirect::route('login');
        }

        // public function loginProcess(Request $request)
        // {
        //     $authClient = $request->only([
        //         'email',
        //         'password',
        //     ]);

        //     if (Auth::guard()->attempt($authClient)) {
        //         $request->session()->regenerate();
        //         return redirect()->route('department.index');
        //     }

        //     return back();
        // }

}
