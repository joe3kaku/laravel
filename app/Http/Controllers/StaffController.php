<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //ADD START YOSHIDA 2019/04/16
    public function getIndex(){
      echo "test";
      $staffs = \App\Staff::all();
      // return view('staff.list',compact('staffs'));
    }
    //ADD END   YOSHIDA 2019/04/16
}
