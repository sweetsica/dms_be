<?php

namespace App\Http\Controllers;

use App\Models\Rank_1;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct()
    {
        //get current user in session
        $user = session()->get('user');
        if (!$user) {
            return redirect('/login');
        }
    }

    public function index(){

        $rank1 = Rank_1::all();
        return view("Rank_1.index",["rank1"=>$rank1]);

    }


}
