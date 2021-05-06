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

Route::get('nhanvien/dantoc','DanToc\DanTocController@index');
Route::post('nhanvien/dantoc/them','DanToc\DanTocController@create');
// Fix
Route::post('nhanvien/dantoc/sua/{id}','DanToc\DanTocController@edit');
// Delete
Route::get('nhanvien/dantoc/xoa/{id}','DanToc\DanTocController@destroy');
Route::get('nhanvien/dantoc/xoa','DanToc\DanTocController@destroyAll');

Route::get('nhanvien/dantoc/export', 'DanToc\DanTocController@export')->name('export');

Route::post('nhanvien/dantoc/import', 'DanToc\DanTocController@import')->name('import');


Route::get('nhanvien/hocvan','TrinhDoHocVan\TrinhDoHocVanController@index');
Route::post('nhanvien/hocvan/them','TrinhDoHocVan\TrinhDoHocVanController@create');
// Fix
Route::post('nhanvien/hocvan/sua/{id}','TrinhDoHocVan\TrinhDoHocVanController@edit');
// Delete
Route::get('nhanvien/hocvan/xoa/{id}','TrinhDoHocVan\TrinhDoHocVanController@destroy');
Route::get('nhanvien/hocvan/xoa','TrinhDoHocVan\TrinhDoHocVanController@destroyAll');

Route::get('nhanvien/hocvan/export', 'TrinhDoHocVan\TrinhDoHocVanController@export')->name('export');
Route::post('nhanvien/hocvan/import', 'TrinhDoHocVan\TrinhDoHocVanController@import')->name('import');



Route::get('nhanvien/tinhoc','TrinhDoTinHoc\TrinhDoTinHocController@index');
Route::post('nhanvien/tinhoc/them','TrinhDoTinHoc\TrinhDoTinHocController@create');
// Fix
Route::post('nhanvien/tinhoc/sua/{id}','TrinhDoTinHoc\TrinhDoTinHocController@edit');
// Delete
Route::get('nhanvien/tinhoc/xoa/{id}','TrinhDoTinHoc\TrinhDoTinHocController@destroy');
Route::get('nhanvien/tinhoc/xoa','TrinhDoTinHoc\TrinhDoTinHocController@destroyAll');

Route::get('nhanvien/tinhoc/export', 'TrinhDoTinHoc\TrinhDoTinHocController@export')->name('export');
Route::post('nhanvien/tinhoc/import', 'TrinhDoTinHoc\TrinhDoTinHocController@import')->name('import');




