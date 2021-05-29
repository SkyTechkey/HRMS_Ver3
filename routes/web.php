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
<<<<<<< HEAD


    // Router phân quyền phòng ban
     // Quản lý chức vụ
     Route::group(['middleware' => ['can:View.PhongBan']], function () {
        Route::get('settings/danhmuc/phongban','DanhMuc\phongBanController@index')->name('phongban.index');
    });
    Route::group(['middleware' => ['can:Edit.PhongBan']], function () {
        Route::post('settings/danhmuc/phongban/update/{id}','DanhMuc\phongBanController@update')->name('phongban.edit');
    });
    Route::group(['middleware' => ['can:Create.PhongBan']], function () {
        Route::post('settings/danhmuc/phongban/store','DanhMuc\phongBanController@store')->name('phongban.store');
    });
    Route::group(['middleware' => ['can:Delete.PhongBan']], function () {
        Route::get('settings/danhmuc/phongban/destroy/{id}','DanhMuc\phongBanController@destroy')->name('phongban.delete');
        
    });
    Route::group(['middleware' => ['can:Import.PhongBan']], function () {
        Route::post('settings/danhmuc/phongban/import', 'DanhMuc\phongBanController@import')->name('phongban.import');
    });
    Route::group(['middleware' => ['can:Export.PhongBan']], function () {
        Route::get('settings/danhmuc/phongban/export', 'DanhMuc\phongBanController@export')->name('phongban.export');
    
    });




=======
    // Quản lý tuyển dụng
    // Quản lý chức vụ
    Route::group(['middleware' => ['can:View.TuyenDung']], function () {
        Route::get('settings/danhmuc/tuyendung','DanhMuc\tuyenDungController@index')->name('tuyendung.index');
    });
    Route::group(['middleware' => ['can:Edit.TuyenDung']], function () {
        Route::post('settings/danhmuc/tuyendung/update/{id}','DanhMuc\tuyenDungController@update')->name('tuyendung.edit');
    });
    Route::group(['middleware' => ['can:Create.TuyenDung']], function () {
        Route::post('settings/danhmuc/tuyendung/store','DanhMuc\tuyenDungController@store')->name('tuyendung.store');
    });
    Route::group(['middleware' => ['can:Delete.TuyenDung']], function () {
        Route::get('settings/danhmuc/tuyendung/destroy/{id}','DanhMuc\tuyenDungController@destroy')->name('tuyendung.delete');
        
    });
    Route::group(['middleware' => ['can:Import.TuyenDung']], function () {
        Route::post('settings/danhmuc/tuyendung/import', 'DanhMuc\tuyenDungController@import')->name('tuyendung.import');
    });
    Route::group(['middleware' => ['can:Export.TuyenDung']], function () {
        Route::get('settings/danhmuc/tuyendung/export', 'DanhMuc\tuyenDungController@export')->name('tuyendung.export');
    
    });
>>>>>>> origin/QuanLyTuyenDung_Viet




     // Quản lý chức vụ
     Route::group(['middleware' => ['can:View.ChucVu']], function () {
        Route::get('settings/danhmuc/chucvu','DanhMuc\chucVuController@index')->name('chucvu.index');
    });
    Route::group(['middleware' => ['can:Edit.ChucVu']], function () {
        Route::post('settings/danhmuc/chucvu/update/{id}','DanhMuc\chucVuController@update')->name('chucvu.edit');
    });
    Route::group(['middleware' => ['can:Create.ChucVu']], function () {
        Route::post('settings/danhmuc/chucvu/store','DanhMuc\chucVuController@store')->name('chucvu.store');
    });
    Route::group(['middleware' => ['can:Delete.ChucVu']], function () {
        Route::get('settings/danhmuc/chucvu/destroy/{id}','DanhMuc\chucVuController@destroy')->name('chucvu.delete');
        
    });
    Route::group(['middleware' => ['can:Import.ChucVu']], function () {
        Route::post('settings/danhmuc/chucvu/import', 'DanhMuc\chucVuController@import')->name('chucvu.import');
    });
    Route::group(['middleware' => ['can:Export.ChucVu']], function () {
        Route::get('settings/danhmuc/chucvu/export', 'DanhMuc\chucVuController@export')->name('chucvu.export');
    
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

    Route::get('ngoaingu','Quanly\QuanlyNgoainguController@index')->name('ngoaingu');
    Route::post('ngoaingu/them','Quanly\QuanlyNgoainguController@create');
    Route::get('ngoaingu/xoa/{id}','Quanly\QuanlyNgoainguController@destroy');
    Route::get('ngoaingu/xoaAll','Quanly\QuanlyNgoainguController@destroyAll');
    Route::post('ngoaingu/sua/{id}','Quanly\QuanlyNgoainguController@edit');
    Route::get('ngoaingu/export', 'Quanly\QuanlyNgoainguController@export')->name('NgoainguExport');
    Route::post('ngoaingu/import', 'Quanly\QuanlyNgoainguController@import')->name('NgoainguImport');

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

