<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\UserOtp;

class ForgotPasswordController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('QuenMatKhau.forgetPassword');
    }
}
