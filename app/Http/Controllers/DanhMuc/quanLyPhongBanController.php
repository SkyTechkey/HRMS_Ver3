<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyPhongBan;
use App\Models\QuanlyChinhanh;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhongbanExport;
use App\Imports\PhongbanImport;

class quanLyPhongBanController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyPhongBan::all();
        //$danhsach_chinhanh = QuanLyChiNhanh::all();
        $danhsach_chinhanh = QuanLyChiNhanh::where('Trangthai', "Hoạt động")
              // ->orderBy('name', 'desc')
             //  ->take(10)
               ->get();
        return view('Settings.Danhmuc.quanlyphongban',compact('danhsach','danhsach_chinhanh'));
    }

    public function store(Request $request)
    {
        $createPhongBan = new QuanLyPhongBan;
        $createPhongBan->Ten_phongban = $request->name;
        $createPhongBan->ID_Chinhanh = $request->ID_Chinhanh;
        $createPhongBan->Ghichu = $request->Ghichu;
        $createPhongBan->Trangthai = $request->status;
        if($createPhongBan->save())
        {
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Lỗi không thể thêm dữ liệu!'));
        }
    }

    public function destroy($id)
    {
        $deletePhongban = QuanLyPhongBan::find($id);

        if(!empty($deletePhongban))
        {
            if($deletePhongban->delete())
            {
               return back()->with('success',__('Đã xóa dữ liệu thành công!'));
            }
            else
            {
                return back()->with('error',__('Lỗi không thể xóa dữ liệu!'));
            }
        }
        else
        {
            return back()->with('error',__('Bạn không được quyền xóa dữ liệu này!'));
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {

    }
    public function import()
    {
        if (!empty(request()->file('file')))
        {

            $extension_file = request()->file('file');
            if($extension_file->getClientOriginalExtension() == 'xlsx'){
                Excel::import(new PhongbanImport,request()->file('file'));
                return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
            }
            else{
                return back()->with('error',__('Vui lòng chọn tệp excel'));
            }

        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export()
    {
        return Excel::download(new PhongbanExport, 'DS_Phongban.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Phongban = QuanLyPhongBan::find($id);
        if(!empty($update_Phongban)){
            $update_Phongban->Ten_phongban = $request->name;
            $update_Phongban->Chinhanh = $request->chinhanh;
            $update_Phongban->Ghichu = $request->Ghichu;
            $update_Phongban->Trangthai = $request->status;
            if($update_Phongban->save())
            {
                return back()->with('success',__('Đã cập nhập dữ liệu thành công!'));
            }
            else{
                return back()->with('error',__('Lỗi không thể cập nhập dữ liệu!'));
            }
        }
        else
        {
            return back()->with('error',__('Bạn không được quyền cập nhập dữ liệu!'));
        }

    }
}
