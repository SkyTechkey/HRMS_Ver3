<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyNgoaiNgu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NgoainguExport;
use App\Imports\NgoainguImport;

class quanLyNgoaiNguController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyNgoaiNgu::all();
        return view('Settings.Danhmuc.quanlyngoaingu',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createNgoaiNgu = new QuanLyNgoaiNgu;
        $createNgoaiNgu->Ten_ngoaingu = $request->name;
        $createNgoaiNgu->Ghichu = $request->ghichu;
        $createNgoaiNgu->Trangthai = $request->status;
        if($createNgoaiNgu->save())
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
        $deleteNgoaiNgu = QuanLyNgoaiNgu::find($id);

        if(!empty($deleteNgoaiNgu))
        {
            if($deleteNgoaiNgu->delete())
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
            Excel::import(new NgoainguImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export()
    {
        return Excel::download(new NgoainguExport, 'DS_NgoaiNgu.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Ngoaingu = QuanLyNgoaiNgu::find($id);
        if(!empty($update_Ngoaingu)){
            $update_Ngoaingu->Ten_ngoaingu = $request->name;
            $update_Ngoaingu->Ghichu = $request->ghichu;
            $update_Ngoaingu->Trangthai = $request->status;
            if($update_Ngoaingu->save())
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
