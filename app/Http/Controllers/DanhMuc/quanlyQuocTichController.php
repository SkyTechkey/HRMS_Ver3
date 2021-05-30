<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyQuocTich;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuocTichExport;
use App\Imports\QuoctichImport;

class quanlyQuocTichController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyQuocTich::all();
        return view('Settings.Danhmuc.quanlyquoctich',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createquoctich = new QuanLyQuocTich;
        $createquoctich->Ten_quoctich = $request->name;
        $createquoctich->Trangthai = $request->status;
        $createquoctich->Ghichu = $request->Ghichu;
        if($createquoctich->save())
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
        $deletequoctich= QuanLyQuocTich::find($id);

        if(!empty($deletequoctich))
        {
            if($deletequoctich->delete())
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
            Excel::import(new QuoctichImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export()
    {
        return Excel::download(new QuocTichExport, 'DS_ChiNhanh.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_quoctich = QuanLyQuocTich::find($id);
        if(!empty($update_quoctich)){
            $update_quoctich->Ten_quoctich = $request->name;
            $update_quoctich->Ghichu = $request->ghichu;
            $update_quoctich->Trangthai = $request->status;
            if($update_quoctich->save())
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
