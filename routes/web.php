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

        

        // Quản lý Chi nhánh
        Route::group(['middleware' => ['can:View.ChiNhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh','DanhMuc\quanlyChiNhanhController@index')->name('quanlychinhanh.index');
        });
        Route::group(['middleware' => ['can:Edit.ChiNhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/update/{id}','DanhMuc\quanlyChiNhanhController@update')->name('quanlychinhanh.edit');
        });
        Route::group(['middleware' => ['can:Create.ChiNhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/store','DanhMuc\quanlyChiNhanhController@store')->name('quanlychinhanh.store');
        });
        Route::group(['middleware' => ['can:Delete.ChiNhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh/destroy/{id}','DanhMuc\quanlyChiNhanhController@destroy')->name('quanlychinhanh.delete');

        });
        Route::group(['middleware' => ['can:Import.ChiNhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/import', 'DanhMuc\quanlyChiNhanhController@import')->name('quanlychinhanh.import');
        });
        Route::group(['middleware' => ['can:Export.ChiNhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh/export', 'DanhMuc\quanlyChiNhanhController@export')->name('quanlychinhanh.export');

        });
        // Quản lý phòng ban
        Route::group(['middleware' => ['can:View.PhongBan']], function () {
            Route::get('settings/danhmuc/quanlyphongban','DanhMuc\quanLyPhongBanController@index')->name('quanlyphongban.index');
        });
        Route::group(['middleware' => ['can:Edit.PhongBan']], function () {
            Route::post('settings/danhmuc/quanlyphongban/update/{id}','DanhMuc\quanLyPhongBanController@update')->name('quanlyphongban.edit');
        });
        Route::group(['middleware' => ['can:Create.PhongBan']], function () {
            Route::post('settings/danhmuc/quanlyphongban/store','DanhMuc\quanLyPhongBanController@store')->name('quanlyphongban.store');
        });
        Route::group(['middleware' => ['can:Delete.PhongBan']], function () {
            Route::get('settings/danhmuc/quanlyphongban/destroy/{id}','DanhMuc\quanLyPhongBanController@destroy')->name('quanlyphongban.delete');

        });
        Route::group(['middleware' => ['can:Import.PhongBan']], function () {
            Route::post('settings/danhmuc/quanlyphongban/import', 'DanhMuc\quanLyPhongBanController@import')->name('quanlyphongban.import');
        });
        Route::group(['middleware' => ['can:Export.PhongBan']], function () {
            Route::get('settings/danhmuc/quanlyphongban/export', 'DanhMuc\quanLyPhongBanController@export')->name('quanlyphongban.export');

        });


});

