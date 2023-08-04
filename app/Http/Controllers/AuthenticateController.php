<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function __construct()
    {
        //get current user in session
        $user = session()->get('user');
        if ($user) {
            return redirect()->route('home');
        }
    }

    public function index(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');

            $account = Personnel::where('email', $email)->first();
            if ($account && Hash::check($password, $account->password)) {
                if ($account->status == "Đang làm việc") {
                    $request->session()->put('user', $account);
                    
                    return redirect()->route('home');
                } else {
                    return redirect()->back()
                        ->withInput()->with('loginError', 'Tài khoản của bạn không hoạt động');
                }
            } else {
                return redirect()->back()
                    ->withInput()->with('loginError', 'Sai tài khoản hoặc mật khẩu');
            }
        } catch (Exception $e) {
            return back()->with('loginError', 'Có gì đó sai sai');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        //regenerate csrf token
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
