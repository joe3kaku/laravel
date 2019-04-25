<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Carbon\Carbon;

class MstaffController extends Controller
{
  public function getIndex(){
    $mstaffs = \App\Mstaff::all();
    return view('mstaff.list',compact('mstaffs'));
  }
  public function getSignin(){

    if (Session::has('Staff_ID')) {
      Session::forget('Staff_ID');
    }
    return view('mstaff.signin');
  }
  public function getRegister(){

    if (Session::has('Staff_ID')) {
      Session::forget('Staff_ID');
      Session::forget('Staff_Name');
    }
    return view('mstaff.register');
  }
  public function postSignin(Request $request){

    $this->validate($request,[
      'Staff_ID' => 'required|regex:/^[a-zA-Z0-9]+$/',
      'password' => 'required|min:4'
    ]);

    // TODO Authファサードを利用した認証処理
    // $login = Auth::attempt(['staff_id' => $request->input('Staff_ID'), 'password' => $request->input('password')]);

    // $staff = DB::table('Staff.M_Staff')->where('staff_id', '=', $request->input('Staff_ID'))->first();
    $staff = DB::table('Staff.M_Staff')
      ->where('staff_id', '=', $request->input('Staff_ID'))
      ->where('password', '=', $request->input('password'))
      ->first();
    // ログイン判定
    if (isset($staff)<>0) {
        // TODO: ログイン情報保持
        $request->session()->put('Staff_ID',$staff->Staff_ID);
        $request->session()->put('Staff_Name',$staff->Staff_Name);
        return view('product/main');
    }else{
        $request->session()->flash('login', '社員ＩＤもしくはパスワードが誤っているためログインできません。再度入力してください。');
        return view('mstaff.signin');
    }
  }

  public function DataInsert(Request $request){

    $this->validate($request,[
      'Staff_ID' => 'required|regex:/^[a-zA-Z0-9]+$/|max:10',
      'Staff_Name' => 'required|string|max:40  ',
      'password' => 'required|regex:/^[a-zA-Z0-9]+$/|max:10',
    ]);

    $staff = DB::table('Staff.M_Staff')->where('Staff_ID', '=', $request->input('Staff_ID'))->first();
    if (isset($staff)<>0) {
      $request->session()->flash('doubleCheck', '既にその社員IDは登録されています。');
      return view('mstaff.register');
    }else{
      $request->session()->forget('doubleCheck');
    }

    $dt = Carbon::now();
    $dt->SetTimeZone('Asia/Tokyo');

    $result = DB::table('Staff.M_Staff')->insert([
      'Staff_ID' => $request->input('Staff_ID'),
      'Staff_Name' => $request->input('Staff_Name'),
      'password' => $request->input('password'),
      'insert_date' => $dt->format('Y/m/d H:i:s')
    ]);
    if($result){
      $request->session()->flash('DataInsert', '社員データを登録しました。');
    } else {
      $request->session()->forget('DataInsert');
    }
    return view('mstaff.register');
  }

}
