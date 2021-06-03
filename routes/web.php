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

        

      // Quản lý loại phụ cấp
        Route::group(['middleware' => ['can:View.PhuCap']], function () {
            Route::get('settings/luong/quanlyloaiphucap','Luong\phuCapController@index')->name('quanlyloaiphucap.index');
        });
        Route::group(['middleware' => ['can:Edit.PhuCap']], function () {
            Route::post('settings/luong/quanlyloaiphucap/update/{id}','Luong\phuCapController@update')->name('quanlyloaiphucap.edit');
        });
        Route::group(['middleware' => ['can:Create.PhuCap']], function () {
            Route::post('settings/luong/quanlyloaiphucap/store','Luong\phuCapController@store')->name('quanlyloaiphucap.store');
        });
        Route::group(['middleware' => ['can:Delete.PhuCap']], function () {
            Route::get('settings/luong/quanlyloaiphucap/destroy/{id}','Luong\phuCapController@destroy')->name('quanlyloaiphucap.delete');

        });
        Route::group(['middleware' => ['can:Import.PhuCap']], function () {
            Route::post('settings/luong/quanlyloaiphucap/import', 'Luong\phuCapController@import')->name('quanlyloaiphucap.import');
        });
        Route::group(['middleware' => ['can:Export.PhuCap']], function () {
            Route::get('settings/luong/quanlyloaiphucap/export', 'Luong\phuCapController@export')->name('quanlyloaiphucap.export');

        });

        
        


});

