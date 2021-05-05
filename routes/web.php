<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/phongban','PhongBan\PhongbanController@index');
Route::get('/phongban/them','Phongban\PhongbanController@getThem');
Route::post('/phongban/them','Phongban\PhongbanController@postThem');

Route::get('/phongban/xoa/{id}','Phongban\PhongbanController@delete');

Route::get('/phongban/sua/{id}','Phongban\PhongbanController@getSua');
Route::post('/phongban/sua/{id}','Phongban\PhongbanController@postSua');
Route::get('/branch', 'Branch\BranchController@index')->name('branch');

Route::get('/add-branch', 'Branch\BranchController@create')->name('add-branch');
Route::post('/add-branch', 'Branch\BranchController@store')->name('add-branch');

Route::get('/delete/{id}', 'Branch\BranchController@destroy')->name('delete-branch');

Route::get('/update/{id}', 'Branch\BranchController@edit')->name('update-branch');
Route::post('/update/{id}', 'Branch\BranchController@update')->name('update-branch');

Route::get('nhansu', 'Quanly\QuanlyNhansuController@index')->name('nhansuIndex');
Route::group(['middleware' => ['can:sua']], function () {
    Route::get('nhansu/{id}/edit', 'Quanly\QuanlyNhansuController@edit')->name('nhansuEdit');
    Route::post('nhansu/update/{id}', 'Quanly\QuanlyNhansuController@update')->name('nhansuUpdate');
});
Route::group(['middleware' => ['can:xoa']], function () {
    Route::get('nhansu/{id}/delete', 'Quanly\QuanlyNhansuController@destroy')->name('nhansuDelete'); 
});
Route::group(['middleware' => ['can:them']], function () {
    Route::get('nhansu/create', 'Quanly\QuanlyNhansuController@create')->name('nhansuCreate');
    Route::post('nhansu/create', 'Quanly\QuanlyNhansuController@store')->name('nhansuStore');
});




Route::get('role','PhanQuyen\PhanQuyenController@getRole')->name('quyen');
Route::post('role/them','PhanQuyen\PhanQuyenController@createRole');
Route::get('role/xoa/{id}','PhanQuyen\PhanQuyenController@deleteRole');
Route::post('role/sua/{id}','PhanQuyen\PhanQuyenController@editRole');

Route::get('tongiao','Quanly\QuanlyTongiaoController@index')->name('tongiao');
Route::post('tongiao/them','Quanly\QuanlyTongiaoController@create');
Route::get('tongiao/xoa/{id}','Quanly\QuanlyTongiaoController@destroy');
Route::get('tongiao/xoaAll','Quanly\QuanlyTongiaoController@destroyAll');
Route::post('tongiao/sua/{id}','Quanly\QuanlyTongiaoController@edit');
Route::get('tongiao/export', 'Quanly\QuanlyTongiaoController@export')->name('TongiaoExport');
Route::post('tongiao/import', 'Quanly\QuanlyTongiaoController@import')->name('TongiaoImport');

Route::get('chucnang','PhanQuyen\PhanQuyenController@getChucNang');
Route::post('chucnang/them','PhanQuyen\PhanQuyenController@createChucNang');
Route::get('chucnang/xoa/{id}','PhanQuyen\PhanQuyenController@deleteChucNang');
Route::post('chucnang/sua/{id}','PhanQuyen\PhanQuyenController@editChucNang');

Route::get('nhanvien/vaitro','PhanQuyen\PhanQuyenController@index');
Route::get('nhanvien/vaitro/danhsach','PhanQuyen\PhanQuyenController@getListRoleUser');
Route::post('nhanvien/vaitro/sua/{id}','PhanQuyen\PhanQuyenController@postEditRoleUser');

Route::get('phanquyen','PhanQuyen\PhanQuyenController@getPhanQuyen')->name('suaQuyen');
Route::post('phanquyen/sua/{id}','PhanQuyen\PhanQuyenController@editRolePermission');



