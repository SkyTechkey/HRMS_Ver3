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
    //Route::resource('settings/role', 'PhanQuyen\RoleController');
        Route::get('settings/role','PhanQuyen\RoleController@index')->name('role.index');
        Route::post('settings/role/store','PhanQuyen\RoleController@store')->name('role.store');
        Route::get('settings/role/delete/{id}','PhanQuyen\RoleController@destroy')->name('role.delete');
        Route::post('settings/role/edit/{id}','PhanQuyen\RoleController@edit')->name('role.edit');
        Route::post('settings/role/update/{id}','PhanQuyen\RoleController@update')->name('role.update');

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
   
   

    
    





    Route::get('chucnang','PhanQuyen\PhanQuyenController@getChucNang');
    Route::post('chucnang/them','PhanQuyen\PhanQuyenController@createChucNang');
    Route::get('chucnang/xoa/{id}','PhanQuyen\PhanQuyenController@deleteChucNang');
    Route::post('chucnang/sua/{id}','PhanQuyen\PhanQuyenController@editChucNang');

    Route::get('nhanvien/vaitro','PhanQuyen\PhanQuyenController@index');
    Route::get('nhanvien/vaitro/danhsach','PhanQuyen\PhanQuyenController@getListRoleUser');
    Route::post('nhanvien/vaitro/sua/{id}','PhanQuyen\PhanQuyenController@postEditRoleUser');

    Route::get('phanquyen','PhanQuyen\PhanQuyenController@getPhanQuyen')->name('suaQuyen');
    Route::post('phanquyen/sua/{id}','PhanQuyen\PhanQuyenController@editRolePermission');

    Route::get('/settings/danhmuc/tinhthanhpho', 'Danhmuc\TinhthanhphoController@index')->name('Index.tinhthanhpho'); //chú thích: Hiển thị danh sách
    Route::get('/getQuanhuyen/{id}', "Danhmuc\TinhthanhphoController@getQuanhuyen")->name('getQuanhuyen'); //Hiển thị danh sách quận huyện
    Route::get('/getXaphuong/{id}', "Danhmuc\TinhthanhphoController@getXaphuong")->name('getXaphuong'); //Hiển thị danh sách xã phường
    Route::post('/settings/danhmuc/tinhthanhpho/themdiadanh', "Danhmuc\TinhthanhphoController@store")->name('store.tinhthanhpho'); //Thêm địa chỉ
    Route::get('/settings/danhmuc/tinhthanhpho/xoadiadanh/{id}', "Danhmuc\TinhthanhphoController@destroy")->name('destroy.tinhthanhpho'); //Xoa địa chỉ
    Route::post('/settings/danhmuc/tinhthanhpho/suadiadanh/{id}', "Danhmuc\TinhthanhphoController@update")->name('update.tinhthanhpho'); //Sua địa chỉ


    Route::get('/settings/danhmuc/noilamviec', "Noilamviec\NoilamviecController@index")->name('index.noilamviec'); //Hien thi danh sach
    Route::post('/settings/danhmuc/noilamviec/them', "Noilamviec\NoilamviecController@store")->name('store.noilamviec'); //Them noi lam viec
    Route::post('/settings/danhmuc/noilamviec/sua/{id}', "Noilamviec\NoilamviecController@update")->name('update.noilamviec'); //Sua noi lam viec
    Route::get('/settings/danhmuc/noilamviec/xoa/{id}', "Noilamviec\NoilamviecController@destroy")->name('destroy.noilamviec.{id}'); //Sua noi lam viec

});

