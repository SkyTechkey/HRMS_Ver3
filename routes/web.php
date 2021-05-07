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
Route::get('vaitro','PhanQuyen\RoleController@index');
Route::post('vaitro/them','PhanQuyen\RoleController@create');
Route::get('vaitro/xoa/{id}','PhanQuyen\RoleController@destroy');
Route::post('phanquyenvaitro/sua/{id}','PhanQuyen\RoleController@edit');

// Permission

Route::get('chucnang','PhanQuyen\PermissionController@index');
Route::post('chucnang/them','PhanQuyen\PermissionController@create');
Route::get('chucnang/xoa/{id}','PhanQuyen\PermissionController@destroy');
Route::post('chucnang/sua/{id}','PhanQuyen\PermissionController@edit');

// Set Permission On Roles
Route::get('phanquyen','PhanQuyen\SetPermissionOnRoleController@index');
Route::post('phanquyen/sua/{id}','PhanQuyen\SetPermissionOnRoleController@update');

Route::get('nhanvien/chucvu','ChucVu\ChucVuController@index');
Route::post('nhanvien/chucvu/them','ChucVu\ChucVuController@create');
// Fix
Route::post('nhanvien/chucvu/sua/{id}','ChucVu\ChucVuController@edit');
// Delete
Route::get('nhanvien/chucvu/xoa/{id}','ChucVu\ChucVuController@destroy');
Route::get('nhanvien/chucvu/xoa','ChucVu\ChucVuController@destroyAll');

Route::get('nhanvien/chucvu/export', 'ChucVu\ChucVuController@export')->name('export');

Route::post('nhanvien/chucvu/import', 'ChucVu\ChucVuController@import')->name('import');


Route::get('nhanvien/vitri-tuyendung','ViTriTuyenDung\ViTriTuyenDungController@index');
Route::post('nhanvien/vitri-tuyendung/them','ViTriTuyenDung\ViTriTuyenDungController@create');
// Fix
Route::post('nhanvien/vitri-tuyendung/sua/{id}','ViTriTuyenDung\ViTriTuyenDungController@edit');
// Delete
Route::get('nhanvien/vitri-tuyendung/xoa/{id}','ViTriTuyenDung\ViTriTuyenDungController@destroy');
Route::get('nhanvien/vitri-tuyendung/xoa','ViTriTuyenDung\ViTriTuyenDungController@destroyAll');

Route::get('nhanvien/vitri-tuyendung/export', 'ViTriTuyenDung\ViTriTuyenDungController@export')->name('export');
Route::post('nhanvien/vitri-tuyendung/import', 'ViTriTuyenDung\ViTriTuyenDungController@import')->name('import');



Route::get('nhanvien/trinhdo-ngoaingu','TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@index');
Route::post('nhanvien/trinhdo-ngoaingu/them','TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@create');
// Fix
Route::post('nhanvien/trinhdo-ngoaingu/sua/{id}','TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@edit');
// Delete
Route::get('nhanvien/trinhdo-ngoaingu/xoa/{id}','TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@destroy');
Route::get('nhanvien/trinhdo-ngoaingu/xoa','TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@destroyAll');

Route::get('nhanvien/trinhdo-ngoaingu/export', 'TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@export')->name('export');
Route::post('nhanvien/trinhdo-ngoaingu/import', 'TrinhDoNgoaiNgu\TrinhDoNgoaiNguController@import')->name('import');




