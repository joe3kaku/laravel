<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MproductController extends Controller
{
    //
    public function getList(){
      // $products = \App\MProduct::all();
      $products = \App\MProduct::orderBy('product_id','asc')->paginate(10);

      return view('product.listEloquent')->with('products',$products);
    }
}
