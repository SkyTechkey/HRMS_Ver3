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

        // Quản lý quốc tịch
        Route::group(['middleware' => ['can:View.QuocTich']], function () {
            Route::get('settings/danhmuc/quanlyquoctich','DanhMuc\quanLyQuocTichController@index')->name('quanlyquoctich.index');
        });
        Route::group(['middleware' => ['can:Edit.QuocTich']], function () {
            Route::post('settings/danhmuc/quanlyquoctich/update/{id}','DanhMuc\quanLyQuocTichController@update')->name('quanlyquoctich.edit');
        });
        Route::group(['middleware' => ['can:Create.QuocTich']], function () {
            Route::post('settings/danhmuc/quanlyquoctich/store','DanhMuc\quanLyQuocTichController@store')->name('quanlyquoctich.store');
        });
        Route::group(['middleware' => ['can:Delete.QuocTich']], function () {
            Route::get('settings/danhmuc/quanlyquoctich/destroy/{id}','DanhMuc\quanLyQuocTichController@destroy')->name('quanlyquoctich.delete');

        });
        Route::group(['middleware' => ['can:Import.QuocTich']], function () {
            Route::post('settings/danhmuc/quanlyquoctich/import', 'DanhMuc\quanLyQuocTichController@import')->name('quanlyquoctich.import');
        });
        Route::group(['middleware' => ['can:Export.QuocTich']], function () {
            Route::get('settings/danhmuc/quanlyquoctich/export', 'DanhMuc\quanLyQuocTichController@export')->name('quanlyquoctich.export');

        });

        // Quản lý Chi nhánh
        Route::group(['middleware' => ['can:View.Chinhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh','DanhMuc\quanlyChinhNhanhController@index')->name('quanlychinhanh.index');
        });
        Route::group(['middleware' => ['can:Edit.Chinhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/update/{id}','DanhMuc\quanlyChinhNhanhController@update')->name('quanlychinhanh.edit');
        });
        Route::group(['middleware' => ['can:Create.Chinhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/store','DanhMuc\quanlyChinhNhanhController@store')->name('quanlychinhanh.store');
        });
        Route::group(['middleware' => ['can:Delete.Chinhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh/destroy/{id}','DanhMuc\quanlyChinhNhanhController@destroy')->name('quanlychinhanh.delete');

        });
        Route::group(['middleware' => ['can:Import.Chinhanh']], function () {
            Route::post('settings/danhmuc/quanlychinhanh/import', 'DanhMuc\quanlyChinhNhanhController@import')->name('quanlychinhanh.import');
        });
        Route::group(['middleware' => ['can:Export.Chinhanh']], function () {
            Route::get('settings/danhmuc/quanlychinhanh/export', 'DanhMuc\quanlyChinhNhanhController@export')->name('quanlychinhanh.export');

        });


});

