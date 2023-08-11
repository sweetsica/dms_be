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

    public function index(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');

            $account = Personnel::where('email', $email)->where('password', $password)->firstOrFail();
            if ($account) {
                if ($account->status == "Đang làm việc") {
                    $account->load('department');
                    $departmentName = $account->department ? $account->department->name : "Unknown";
                    $request->session()->put('department_name', $departmentName);
                    $request->session()->put('user', $account);
                    $request->session()->put('statsus', $account->role_id);
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
            return back()->with('loginError', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/login');
    }
}
