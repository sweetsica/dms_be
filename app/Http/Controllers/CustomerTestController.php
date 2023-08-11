<?php

namespace App\Http\Controllers;



class CustomerTestController extends Controller
{
   public function index1() {
    return view('cutomerTest.index1');
   }

   public function index2() {
    return view('cutomerTest.index2');

   }
}
