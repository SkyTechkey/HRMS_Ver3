<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//=========== phần Private có yêu cầu đăng nhập ===============================

Route::middleware(['auth'])->group(function () {


        Route::get('/home1', function () {

           // $id = Auth::id();
        //   $id = . Auth::user()->id;
         //   dd( $id);
          //  echo '<br>ID tai khoan = ' . Auth::id();
          return view('testquyen');

         });//->middleware('can:User.Add');


});

Route::get('danhsachdantoc', 'Dantoc\DantocController@index')->name('danhsach');
Route::post('them', 'Dantoc\DantocController@store')->name('them');
Route::post('sua/{id}', 'Dantoc\DantocController@update')->name('sua');
Route::get('xoa/{id}', 'Dantoc\DantocController@destroy')->name('xoa');

Route::get('xuat', 'Dantoc\DantocController@export')->name('xuat');
Route::post('nhap', 'Dantoc\DantocController@import')->name('nhap');
