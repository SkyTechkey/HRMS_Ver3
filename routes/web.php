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

        

      // Quản lý loại hồ sơ
        Route::group(['middleware' => ['can:View.LoaiHoSo']], function () {
            Route::get('settings/hoso/quanlyloaihoso','Hoso\quanLyLoaiHoSoController@index')->name('quanlyloaihoso.index');
        });
        Route::group(['middleware' => ['can:Edit.LoaiHoSo']], function () {
            Route::post('settings/hoso/quanlyloaihoso/update/{id}','HoSo\quanLyLoaiHoSoController@update')->name('quanlyloaihoso.edit');
        });
        Route::group(['middleware' => ['can:Create.LoaiHoSo']], function () {
            Route::post('settings/hoso/quanlyloaihoso/store','HoSo\quanLyLoaiHoSoController@store')->name('quanlyloaihoso.store');
        });
        Route::group(['middleware' => ['can:Delete.LoaiHoSo']], function () {
            Route::get('settings/hoso/quanlyloaihoso/destroy/{id}','HoSo\quanLyLoaiHoSoController@destroy')->name('quanlyloaihoso.delete');

        });
        Route::group(['middleware' => ['can:Import.LoaiHoSo']], function () {
            Route::post('settings/hoso/quanlyloaihoso/import', 'HoSo\quanLyLoaiHoSoController@import')->name('quanlyloaihoso.import');
        });
        Route::group(['middleware' => ['can:Export.LoaiHoSo']], function () {
            Route::get('settings/hoso/quanlyloaihoso/export', 'HoSo\quanLyLoaiHoSoController@export')->name('quanlyloaihoso.export');

        });

        // Quản lý hồ sơ
        Route::group(['middleware' => ['can:View.HoSo']], function () {
            Route::get('settings/hoso/quanlyhoso','HoSo\quanLyHoSoController@index')->name('quanlyhoso.index');
        });
        Route::group(['middleware' => ['can:Edit.HoSo']], function () {
            Route::post('settings/hoso/quanlyhoso/update/{id}','HoSo\quanLyHoSoController@update')->name('quanlyhoso.edit');
        });
        Route::group(['middleware' => ['can:Delete.HoSo']], function () {
            Route::get('settings/hoso/quanlyhoso/destroy/{id}','HoSo\quanLyHoSoController@destroy')->name('quanlyhoso.delete');

        });
        Route::group(['middleware' => ['can:Export.HoSo']], function () {
            Route::get('settings/hoso/quanlyhoso/export', 'HoSo\quanLyHoSoController@export')->name('quanlyhoso.export');

        });
        


});

