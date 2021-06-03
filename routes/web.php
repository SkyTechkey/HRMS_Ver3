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

        

       
        // Quản lý khóa đào tạo
        Route::group(['middleware' => ['can:View.KhoaDaoTao']], function () {
            Route::get('settings/daotao/quanlykhoadaotao','DaoTao\khoaDaoTaoController@index')->name('quanlykhoadaotao.index');
        });
        Route::group(['middleware' => ['can:Edit.KhoaDaoTao']], function () {
            Route::post('settings/daotao/quanlykhoadaotao/update/{id}','DaoTao\khoaDaoTaoController@update')->name('quanlykhoadaotao.edit');
        });
        Route::group(['middleware' => ['can:Create.KhoaDaoTao']], function () {
            Route::post('settings/daotao/quanlykhoadaotao/store','DaoTao\khoaDaoTaoController@store')->name('quanlykhoadaotao.store');
        });
        Route::group(['middleware' => ['can:Delete.KhoaDaoTao']], function () {
            Route::get('settings/daotao/quanlykhoadaotao/destroy/{id}','DaoTao\khoaDaoTaoController@destroy')->name('quanlykhoadaotao.delete');

        });
        Route::group(['middleware' => ['can:Import.KhoaDaoTao']], function () {
            Route::post('settings/daotao/quanlykhoadaotao/import', 'DaoTao\khoaDaoTaoController@import')->name('quanlykhoadaotao.import');
        });
        Route::group(['middleware' => ['can:Export.KhoaDaoTao']], function () {
            Route::get('settings/daotao/quanlykhoadaotao/export', 'DaoTao\khoaDaoTaoController@export')->name('quanlykhoadaotao.export');

        });
        


});

