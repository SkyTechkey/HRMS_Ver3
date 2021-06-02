<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyTinhThanhPho;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TinhthanhphoExport;
use App\Imports\TinhthanhphoImport;

class quanLyTinhThanhPhoController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyTinhThanhPho::all();
        
        return view('Settings.Danhmuc.quanlytinhthanhpho',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createTinhThanhPho = new QuanLyTinhThanhPho;
        $createTinhThanhPho->Ten_tinhthanhpho = $request->name;
        $createTinhThanhPho->Ghichu = $request->Ghichu;
        $createTinhThanhPho->Trangthai = $request->status;
        if($createTinhThanhPho->save())
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
        $deleteTinhThanhPho = QuanLyTinhThanhPho::find($id);

        if(!empty($deleteTinhThanhPho))
        {
            if($deleteTinhThanhPho->delete())
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
                Excel::import(new TinhthanhphoImport,request()->file('file'));
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
        return Excel::download(new TinhthanhphoExport, 'DS_TinhThanhPho.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Tinhthanhpho = QuanLyTinhThanhPho::find($id);
        if(!empty($update_Tinhthanhpho)){
            $update_Tinhthanhpho->Ten_tinhthanhpho = $request->name;
            $update_Tinhthanhpho->Ghichu = $request->Ghichu;
            $update_Tinhthanhpho->Trangthai = $request->status;
            if($update_Tinhthanhpho->save())
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
