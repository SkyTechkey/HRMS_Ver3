<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyDanToc;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DantocExport;
use App\Imports\DantocImport;

class quanLyDanTocController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyDanToc::all();
        return view('Settings.Danhmuc.quanlydantoc',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createDanToc = new QuanLyDanToc;
        $createDanToc->Ten_dantoc = $request->name;
        $createDanToc->Ghichu = $request->ghichu;
        $createDanToc->Trangthai = $request->status;
        if($createDanToc->save())
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
        $deleteDanToc = QuanLyDanToc::find($id);

        if(!empty($deleteDanToc))
        {
            if($deleteDanToc->delete())
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

            // if($test->getClientOriginalExtension == xlsx)
            if($extension_file->getClientOriginalExtension() == 'xlsx'){
<<<<<<< HEAD:app/Http/Controllers/DanhMuc/quanLyDanTocController.php
                Excel::import(new DantocImport,request()->file('file'));
=======
                Excel::import(new QuoctichImport,request()->file('file'));
>>>>>>> origin/QuanLyQuocTich_Viet:app/Http/Controllers/DanhMuc/quanlyQuocTichController.php
                return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
            }
            else{
                return back()->with('error',__('Vui lòng chọn file excel!'));
            }
            
            
        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export()
    {
<<<<<<< HEAD:app/Http/Controllers/DanhMuc/quanLyDanTocController.php
        return Excel::download(new DantocExport, 'DS_Dantoc.xlsx');
=======
        return Excel::download(new QuocTichExport, 'DS_QuocTich.xlsx');
>>>>>>> origin/QuanLyQuocTich_Viet:app/Http/Controllers/DanhMuc/quanlyQuocTichController.php
    }
      public function update(Request $request, $id)
    {
        $update_Dantoc = QuanLyDanToc::find($id);
        if(!empty($update_Dantoc)){
            $update_Dantoc->Ten_dantoc = $request->name;
            $update_Dantoc->Ghichu = $request->ghichu;
            $update_Dantoc->Trangthai = $request->status;
            if($update_Dantoc->save())
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
