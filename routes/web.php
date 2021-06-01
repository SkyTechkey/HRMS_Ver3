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

        

       // Quản lý tỉnh thành phố
        Route::group(['middleware' => ['can:View.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlytinhthanhpho','DanhMuc\quanLyTinhThanhPhoController@index')->name('quanlytinhthanhpho.index');
        });
        Route::group(['middleware' => ['can:Edit.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlytinhthanhpho/update/{id}','DanhMuc\quanLyTinhThanhPhoController@update')->name('quanlytinhthanhpho.edit');
        });
        Route::group(['middleware' => ['can:Create.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlytinhthanhpho/store','DanhMuc\quanLyTinhThanhPhoController@store')->name('quanlytinhthanhpho.store');
        });
        Route::group(['middleware' => ['can:Delete.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlytinhthanhpho/destroy/{id}','DanhMuc\quanLyTinhThanhPhoController@destroy')->name('quanlytinhthanhpho.delete');

        });
        Route::group(['middleware' => ['can:Import.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlytinhthanhpho/import', 'DanhMuc\quanLyTinhThanhPhoController@import')->name('quanlytinhthanhpho.import');
        });
        Route::group(['middleware' => ['can:Export.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlytinhthanhpho/export', 'DanhMuc\quanLyTinhThanhPhoController@export')->name('quanlytinhthanhpho.export');

        });
        // Quản lý quận huyện
        Route::group(['middleware' => ['can:View.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyquanhuyen','DanhMuc\quanLyQuanHuyenController@index')->name('quanlyquanhuyen.index');
        });
        Route::group(['middleware' => ['can:Edit.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyquanhuyen/update/{id}','DanhMuc\quanLyQuanHuyenController@update')->name('quanlyquanhuyen.edit');
        });
        Route::group(['middleware' => ['can:Create.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyquanhuyen/store','DanhMuc\quanLyQuanHuyenController@store')->name('quanlyquanhuyen.store');
        });
        Route::group(['middleware' => ['can:Delete.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyquanhuyen/destroy/{id}','DanhMuc\quanLyQuanHuyenController@destroy')->name('quanlyquanhuyen.delete');

        });
        Route::group(['middleware' => ['can:Import.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyquanhuyen/import', 'DanhMuc\quanLyQuanHuyenController@import')->name('quanlyquanhuyen.import');
        });
        Route::group(['middleware' => ['can:Export.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyquanhuyen/export', 'DanhMuc\quanLyQuanHuyenController@export')->name('quanlyquanhuyen.export');

        });
        // Quản lý xã phường
        Route::group(['middleware' => ['can:View.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyxaphuong','DanhMuc\quanLyXaPhuongController@index')->name('quanlyxaphuong.index');
        });
        Route::group(['middleware' => ['can:Edit.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyxaphuong/update/{id}','DanhMuc\quanLyXaPhuongController@update')->name('quanlyxaphuong.edit');
        });
        Route::group(['middleware' => ['can:Create.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyxaphuong/store','DanhMuc\quanLyXaPhuongController@store')->name('quanlyxaphuong.store');
        });
        Route::group(['middleware' => ['can:Delete.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyxaphuong/destroy/{id}','DanhMuc\quanLyXaPhuongController@destroy')->name('quanlyxaphuong.delete');

        });
        Route::group(['middleware' => ['can:Import.TinhThanh']], function () {
            Route::post('settings/danhmuc/quanlyxaphuong/import', 'DanhMuc\quanLyXaPhuongController@import')->name('quanlyxaphuong.import');
        });
        Route::group(['middleware' => ['can:Export.TinhThanh']], function () {
            Route::get('settings/danhmuc/quanlyxaphuong/export', 'DanhMuc\quanLyXaPhuongController@export')->name('quanlyxaphuong.export');

        });
        


});

