<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;
use Session;

class ProductController extends Controller
{
  public function getIndex(){
    $products = \App\Product::all();
    return view('product.list',compact('products'));
  }
  public function main(){
    return view('product.main');
  }
  public function searchIndex(){
    if (Session::has('Staff_ID')) {
      return view('product.search');
    }else{
      return view('mstaff.signin');
    }
  }
  public function createIndex(){
    if (Session::has('Staff_ID')) {
      return view('product.create');
    }else{
      return view('mstaff.signin');
    }
  }
  public function DataInsert(Request $request){

    $request->session()->forget('DataInsert');

    $this->validate($request,[
      'Product_ID' => 'required|regex:/^[a-zA-Z0-9]+$/|max:8',  //半角英数字8桁
      'Product_Name' => 'required|string|max:50',               //文字列50桁
      'Product_Val' => 'required|integer  ',                      //数値
    ]);

    $product = DB::table('Product.M_Product')->where('Product_ID', '=', $request->input('Product_ID'))->first();
    if (isset($product)<>0) {
      $request->session()->flash('doubleCheck', '既にその商品コードは登録されています。');
      return view('product.create');
    }else{
      $request->session()->forget('doubleCheck');
    }

    $dt = Carbon::now();
    $dt->SetTimeZone('Asia/Tokyo');

    $result = DB::table('Product.M_Product')->insert([
      'Product_ID' => $request->input('Product_ID'),
      'Product_Name' => $request->input('Product_Name'),
      'Product_Val' => $request->input('Product_Val'),
      'insert_date' => $dt->format('Y/m/d H:i:s')
    ]);
    if($result){
      $request->session()->flash('DataInsert', '商品データを登録しました。');
    } else {
      $request->session()->forget('DataInsert');
    }
    return view('product.create');
  }
  public function DataSearch(Request $request){

    $request->session()->forget('DataUpdate');

    $product = DB::table('Product.M_Product')->where('product_id', '=', $request->input('search_pid'))->first();
    if (isset($product)<>0) {
        return view('product.search',compact('product'));
    }else{
        $request->session()->flash('DataSearch', '該当する商品が見つかりません。');
        return view('product.search');
    }
  }

  public function DataUpdate(Request $request){

    $this->validate($request,[
      'Product_Name' => 'required|string|max:50',               //文字列50桁
      'Product_Val' => 'required|integer',                      //数値
    ]);

    if(!isset($request->Product_ID)){
      return view('product.search');
    }

    $dt = Carbon::now();
    $dt->SetTimeZone('Asia/Tokyo');

    $result = DB::table('Product.M_Product')->where('Product_ID',$request->input('Product_ID'))->update([
      'Product_Name' => $request->input('Product_Name'),
      'Product_Val' => $request->input('Product_Val'),
      'insert_date' => $dt->format('Y/m/d H:i:s')
    ]);
    if($result==1){
      $request->session()->flash('DataUpdate', '商品データを更新しました。');
    }else{
      $request->session()->forget('DataUpdate');
    }
    return view('product.search');
  }
  public function getList(){

    if (!Session::has('Staff_ID')) {
      return view('mstaff.signin');
    }

    $products = DB::table('Product.M_Product')->get();

    if (isset($products)<>0) {
        return view('product.list',compact('products'));
    }
  }
  public function getListEloquent(){
      $product = new Product;
      $data = $product->find(1);
      // return $data

      // $product=Product::where('Product_ID','')->firstOrFail();
      // dd($user->Product_ID);
  }

  public function DownloadCSV(){

      // $list = DB::table('Product.M_Product')->get();
      $list = DB::table('Product.M_Product')->select('Product_ID as 商品コード','Product_Name as 商品名','Product_Val as 単価','insert_date as 前回登録日時')->get();
      $excel = new FastExcel($list);

      $dt = Carbon::now();
      $dt->SetTimeZone('Asia/Tokyo');

      $filename= $dt->format('YmdHis');
      $filename="ProductList_" . $filename . ".xlsx";
      // $filename="ProductList_" . $filename . ".csv";

      return $excel->download($filename);
  }

}
