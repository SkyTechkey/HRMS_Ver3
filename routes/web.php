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



    Route::get('tongiao','Quanly\QuanlyTongiaoController@index')->name('tongiao');
    Route::post('tongiao/them','Quanly\QuanlyTongiaoController@create');
    Route::get('tongiao/xoa/{id}','Quanly\QuanlyTongiaoController@destroy');
    Route::get('tongiao/xoaAll','Quanly\QuanlyTongiaoController@destroyAll');
    Route::post('tongiao/sua/{id}','Quanly\QuanlyTongiaoController@edit');
    Route::get('tongiao/export', 'Quanly\QuanlyTongiaoController@export')->name('TongiaoExport');
    Route::post('tongiao/import', 'Quanly\QuanlyTongiaoController@import')->name('TongiaoImport');

    Route::get('quoctich','Quanly\QuanlyQuoctichController@index')->name('quoctich');
    Route::post('quoctich/them','Quanly\QuanlyQuoctichController@create');
    Route::get('quoctich/xoa/{id}','Quanly\QuanlyQuoctichController@destroy');
    Route::get('quoctich/xoaAll','Quanly\QuanlyQuoctichController@destroyAll');
    Route::post('quoctich/sua/{id}','Quanly\QuanlyQuoctichController@edit');
    Route::get('quoctich/export', 'Quanly\QuanlyQuoctichController@export')->name('QuoctichExport');
    Route::post('quoctich/import', 'Quanly\QuanlyQuoctichController@import')->name('QuoctichImport');


    // Quản lý role
    Route::group(['middleware' => ['can:View.Role']], function () {
        Route::get('settings/role','QLQuyen\roleController@index')->name('role.index');
    });
    Route::group(['middleware' => ['can:Edit.Role']], function () {
        Route::post('settings/role/update/{id}','QLQuyen\roleController@update')->name('role.edit');
    });
    Route::group(['middleware' => ['can:Create.Role']], function () {
        Route::post('settings/role/store','QLQuyen\roleController@store')->name('role.store');
    });
    Route::group(['middleware' => ['can:Delete.Role']], function () {
        Route::get('settings/role/destroy/{id}','QLQuyen\roleController@destroy')->name('role.delete');
        
    });
    Route::group(['middleware' => ['can:Import.Role']], function () {
        Route::post('settings/role/import', 'QLQuyen\roleController@import')->name('role.import');
    });
    Route::group(['middleware' => ['can:Export.Role']], function () {
        Route::get('settings/role/export', 'QLQuyen\roleController@export')->name('role.export');
    
    });
// Quản lý permission
    Route::group(['middleware' => ['can:View.Permission']], function () {
        Route::get('settings/permission','QLQuyen\permissionController@index')->name('permission.index');
    });
    Route::group(['middleware' => ['can:Edit.Permission']], function () {
        Route::post('settings/permission/update/{id}','QLQuyen\permissionController@update')->name('permission.edit');
    });
    Route::group(['middleware' => ['can:Create.Permission']], function () {
        Route::post('settings/permission/store','QLQuyen\permissionController@store')->name('permission.store');
    });
    Route::group(['middleware' => ['can:Delete.Permission']], function () {
        Route::get('settings/permission/destroy/{id}','QLQuyen\permissionController@destroy')->name('permission.delete');
        
    });
    Route::group(['middleware' => ['can:Import.Permission']], function () {
        Route::post('settings/permission/import', 'QLQuyen\permissionController@import')->name('permission.import');
    });
    Route::group(['middleware' => ['can:Export.Permission']], function () {
        Route::get('settings/permission/export', 'QLQuyen\permissionController@export')->name('permission.export');
    
    });
   
   
   

    
    





    Route::get('chucnang','PhanQuyen\PhanQuyenController@getChucNang');
    Route::post('chucnang/them','PhanQuyen\PhanQuyenController@createChucNang');
    Route::get('chucnang/xoa/{id}','PhanQuyen\PhanQuyenController@deleteChucNang');
    Route::post('chucnang/sua/{id}','PhanQuyen\PhanQuyenController@editChucNang');

    Route::get('nhanvien/vaitro','PhanQuyen\PhanQuyenController@index');
    Route::get('nhanvien/vaitro/danhsach','PhanQuyen\PhanQuyenController@getListRoleUser');
    Route::post('nhanvien/vaitro/sua/{id}','PhanQuyen\PhanQuyenController@postEditRoleUser');

    Route::get('phanquyen','PhanQuyen\PhanQuyenController@getPhanQuyen')->name('suaQuyen');
    Route::post('phanquyen/sua/{id}','PhanQuyen\PhanQuyenController@editRolePermission');



});

