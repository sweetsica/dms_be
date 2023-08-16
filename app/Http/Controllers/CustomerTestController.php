<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class CustomerTestController extends Controller
{
   public function index1() {
    return view('cutomerTest.index1');
   }

   public function index2() {
    return view('cutomerTest.index2');

   }

   public function index3(Request $request) {
      $search = $request->get('search');

      return view('cutomerTest.index3' , [
         'search' => $search,
     ]);
  
     }
}
