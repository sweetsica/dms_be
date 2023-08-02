<?php

namespace App\Http\Controllers;

use App\Models\RouteDirection;
use Illuminate\Http\Request;

class RouteDirectionController extends Controller
{
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