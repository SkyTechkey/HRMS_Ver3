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

//Route::get('/', function () {
 //   return view('welcome');
//});
////Route::get('/', 'loginController@getLogin')->name('getLogin');
//Route::get('/', 'Auth\LoginController@toLogin');

Route::get('/', ['uses' => 'HomeController@login']);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


//=========== phần Private có yêu cầu đăng nhập ===============================
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    // Tạo resource Mau_BLANK
        Route::resource('blanks', 'Mau_BLANKController'); // Dùng resource có thể thay thế tất cả
    // Menu left
        Route::get('settings', 'Settings\settingsController@index')->name('settings.index'); //đặt tên này sau này trong code k cần làm đường dẫn

    // Menu cài đặt
        Route::get('settings/role','PhanQuyen\PhanQuyenController@getRole')->name('quyen');
        Route::post('settings/role/create','PhanQuyen\PhanQuyenController@createRole')->name('createNhomquyen');
        Route::get('settings/role/delete/{id}','PhanQuyen\PhanQuyenController@deleteRole');
        Route::post('settings/role/edit/{id}','PhanQuyen\PhanQuyenController@editRole');

        // Quản lý ngoại ngữ
        Route::group(['middleware' => ['can:View.NgoaiNgu']], function () {
            Route::get('settings/danhmuc/quanlyngoaingu','DanhMuc\quanLyNgoaiNguController@index')->name('quanlyngoaingu.index');
        });
        Route::group(['middleware' => ['can:Edit.NgoaiNgu']], function () {
            Route::post('settings/danhmuc/quanlyngoaingu/update/{id}','DanhMuc\quanLyNgoaiNguController@update')->name('quanlyngoaingu.edit');
        });
        Route::group(['middleware' => ['can:Create.NgoaiNgu']], function () {
            Route::post('settings/danhmuc/quanlyngoaingu/store','DanhMuc\quanLyNgoaiNguController@store')->name('quanlyngoaingu.store');
        });
        Route::group(['middleware' => ['can:Delete.NgoaiNgu']], function () {
            Route::get('settings/danhmuc/quanlyngoaingu/destroy/{id}','DanhMuc\quanLyNgoaiNguController@destroy')->name('quanlyngoaingu.delete');

        });
        Route::group(['middleware' => ['can:Import.NgoaiNgu']], function () {
            Route::post('settings/danhmuc/quanlyngoaingu/import', 'DanhMuc\quanLyNgoaiNguController@import')->name('quanlyngoaingu.import');
        });
        Route::group(['middleware' => ['can:Export.NgoaiNgu']], function () {
            Route::get('settings/danhmuc/quanlyngoaingu/export', 'DanhMuc\quanLyNgoaiNguController@export')->name('quanlyngoaingu.export');

        });

        // Quản lý dân tộc
        Route::group(['middleware' => ['can:View.DanToc']], function () {
            Route::get('settings/danhmuc/quanlydantoc','DanhMuc\quanLyDanTocController@index')->name('quanlydantoc.index');
        });
        Route::group(['middleware' => ['can:Edit.DanToc']], function () {
            Route::post('settings/danhmuc/quanlydantoc/update/{id}','DanhMuc\quanLyDanTocController@update')->name('quanlydantoc.edit');
        });
        Route::group(['middleware' => ['can:Create.DanToc']], function () {
            Route::post('settings/danhmuc/quanlydantoc/store','DanhMuc\quanLyDanTocController@store')->name('quanlydantoc.store');
        });
        Route::group(['middleware' => ['can:Delete.DanToc']], function () {
            Route::get('settings/danhmuc/quanlydantoc/destroy/{id}','DanhMuc\quanLyDanTocController@destroy')->name('quanlydantoc.delete');

        });
        Route::group(['middleware' => ['can:Import.DanToc']], function () {
            Route::post('settings/danhmuc/quanlydantoc/import', 'DanhMuc\quanLyDanTocController@import')->name('quanlydantoc.import');
        });
        Route::group(['middleware' => ['can:Export.DanToc']], function () {
            Route::get('settings/danhmuc/quanlydantoc/export', 'DanhMuc\quanLyDanTocController@export')->name('quanlydantoc.export');

        });

        //Nhân sự
        // Route::group(function() {
            Route::get('nhansu', 'Nhansu\NhansuController@index')->name('index.nhansu');
        // });
        Route::get('nhansu/them', 'Nhansu\NhansuController@create')->name('create.nhansu');
        Route::post('nhansu/them', 'Nhansu\NhansuController@store')->name('store.nhansu');
        Route::get('nhansu/sua/{id}', 'Nhansu\NhansuController@show')->name('show.nhansu');
        Route::post('nhansu/sua/{id}', 'Nhansu\NhansuController@update')->name('update.nhansu');
        Route::get('nhansu/xoa/{id}', 'Nhansu\NhansuController@destroy')->name('destroy.nhansu');
        Route::get('nhansu/xuat', 'Nhansu\NhansuController@export')->name('export.nhansu');
        Route::post('nhansu/nhap', 'Nhansu\NhansuController@import')->name('import.nhansu');

});
