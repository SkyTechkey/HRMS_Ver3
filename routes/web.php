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
    // Quản lý tuyển dụng
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

        //Nhân sự
        // Route::group(function() {
            Route::get('nhansu', 'Nhansu\NhansuController@index')->name('index.nhansu');
        // });
        Route::post('nhansu/them', 'Nhansu\NhansuController@store')->name('store.nhansu');
        Route::post('nhansu/sua/{id}', 'Nhansu\NhansuController@update')->name('update.nhansu');
        Route::get('nhansu/xoa/{id}', 'Nhansu\NhansuController@destroy')->name('destroy.nhansu');
        Route::get('nhansu/xuat', 'Nhansu\NhansuController@export')->name('export.nhansu');
        Route::post('nhansu/nhap', 'Nhansu\NhansuController@import')->name('import.nhansu');

        //Bằng cấp
        
        Route::get('settings/danhmuc/quanlybangcap', 'DanhMuc\quanlyBangCapController@index')->name('bangcap.index');
        Route::post('settings/danhmuc/quanlybangcap/them', 'DanhMuc\quanlyBangCapController@store')->name('bangcap.store');
        Route::post('settings/danhmuc/quanlybangcap/sua/{id}', 'DanhMuc\quanlyBangCapController@edit')->name('bangcap.edit');
        Route::get('settings/danhmuc/quanlybangcap/destroy/{id}','DanhMuc\quanlyBangCapController@destroy')->name('bangcap.destroy');
        Route::get('settings/danhmuc/quanlybangcap/export', 'DanhMuc\quanlyBangCapController@export')->name('bangcap.export');
        Route::post('settings/danhmuc/quanlybangcap/import', 'DanhMuc\quanlyBangCapController@import')->name('bangcap.import');
        
        Route::get('settings/danhmuc/quanlybangcap/export-word', 'DanhMuc\quanlyBangCapController@create')->name('bangcap.create');

    });
