<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('QuenMatKhau.forgetPassword');
    }
}
