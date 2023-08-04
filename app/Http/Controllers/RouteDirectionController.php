<?php

namespace App\Http\Controllers;

use App\Models\RouteDirection;
use Illuminate\Http\Request;

class RouteDirectionController extends Controller
{
    // public function __construct()
    // {
    //     //get current user in session
    //     $user = session()->get('user');
    //     if (!$user) {
    //         return redirect('/login');
    //     }
    // }
    // 
    public function index()
    {
        $routeDirection = RouteDirection::all();
        return view('index', compact('routeDirection'));
    }

    public function showMap($id)
    {
        return view('map', ['id' => $id]);
    }
}