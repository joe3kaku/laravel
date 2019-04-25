<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

App::setLocale('ja');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mstaff','MstaffController@getIndex');
Route::get('product','productController@getIndex');

Route::get('/signin',[
 'uses' => 'MstaffController@getSignin',
 'as' => 'mstaff.signin'
 ]);

 Route::post('/signin',[
   'uses' => 'MstaffController@postSignin',
   'as' => 'mstaff.signin'
 ]);

Route::get('search','productController@searchIndex');
Route::get('create','productController@createIndex');
Route::get('main','productController@main');

Route::post('DataInsert','productController@DataInsert');
Route::post('DataSearch','productController@DataSearch');
Route::post('DataUpdate','productController@DataUpdate');

Route::get('DataInsert','productController@createIndex');
Route::get('DataSearch','productController@searchIndex');


Route::get('list','productController@getList');
Route::get('listEloquent','MproductController@getList');

Route::post('DownloadCSV','productController@DownloadCSV');

Route::get('registerStaff','MstaffController@getRegister');
Route::post('registerStaff','MstaffController@DataInsert');
