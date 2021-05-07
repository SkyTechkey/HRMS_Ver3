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

//Ngoại ngữ
Route::get('ngoaingu', 'NgoaiNgu\NgoaiNguController@index')->name('ngoaingu');
Route::post('themngoaingu', 'NgoaiNgu\NgoaiNguController@store')->name('them');
Route::post('suangoaingu/{id}', 'NgoaiNgu\NgoaiNguController@update')->name('them');
Route::get('xoangoaingu/{id}', 'NgoaiNgu\NgoaiNguController@destroy')->name('xoa');
Route::get('xoahet', 'NgoaiNgu\NgoaiNguController@destroyAll')->name('xoahet');
Route::get('xuat', 'NgoaiNgu\NgoaiNguController@export')->name('xuat');
Route::post('nhap', 'NgoaiNgu\NgoaiNguController@import')->name('nhap');

//Học Vấn
Route::get('hocvan', 'HocVan\TrinhDoHocVanController@index')->name('hocvan');
Route::post('themhocvan', 'HocVan\TrinhDoHocVanController@store')->name('them');
Route::post('suahocvan/{id}', 'HocVan\TrinhDoHocVanController@update')->name('sua');
Route::get('xoahocvan/{id}', 'HocVan\TrinhDoHocVanController@destroy')->name('xoa');
Route::get('xuat', 'HocVan\TrinhDoHocVanController@export')->name('xuat');
Route::post('nhap', 'HocVan\TrinhDoHocVanController@import')->name('nhap');

//Tin học
Route::get('tinhoc', 'HocVan\TinHocController@index')->name('tinhoc');
Route::post('themtinhoc', 'HocVan\TinHocController@store')->name('them');
Route::get('xoahet', 'HocVan\TinHocController@destroyAll')->name('xoahet');
Route::get('xoatinhoc/{id}', 'HocVan\TinHocController@destroy')->name('xoa');
Route::post('suatinhoc/{id}', 'HocVan\TinHocController@update')->name('sua');
Route::get('xuattinhoc', 'HocVan\TinHocController@export')->name('xuattinhoc');
Route::post('nhaptinhoc', 'HocVan\TinHocController@import')->name('nhaptinhoc');





