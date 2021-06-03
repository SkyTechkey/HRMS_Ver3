<?php

namespace App\Http\Controllers\Luong;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhuCap;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhucapExport;
use App\Imports\PhucapImport;

class phuCapController extends Controller
{
    public function index()
    {
        $danhsach = PhuCap::all(); 
        return view('Settings.Luong.quanlyloaiphucap',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createPhuCap = new PhuCap;
        $createPhuCap->Ten_phucap = $request->name;
        $createPhuCap->Sotien = $request->sotien;
        $createPhuCap->Ghichu = $request->Ghichu;
        $createPhuCap->Trangthai = $request->status;
        if($createPhuCap->save())
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
        $deletePhuCap = PhuCap::find($id);
        if(!empty($deletePhuCap))
        {
            $checkLuongPhuCap = $deletePhuCap->luongphucap()->find($id);
            if(!empty($checkLuongPhuCap))
            {
                return back()->with('error',__('Không thể xóa. Dữ liệu này đã tồn tại ở hồ sơ!'));
            }
            else
            {
                if($deletePhuCap->delete())
                {
                return back()->with('success',__('Đã xóa dữ liệu thành công!'));
                }
                else
                {
                    return back()->with('error',__('Lỗi không thể xóa dữ liệu!'));
                }
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
                Excel::import(new PhucapImport,request()->file('file'));
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
        return Excel::download(new PhucapExport, 'DS_Phucap.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Phucap = PhuCap::find($id);
        if(!empty($update_Phucap)){
            $update_Phucap->Ten_phucap = $request->name;
            $update_Phucap->Sotien = $request->sotien;
            $update_Phucap->Ghichu = $request->Ghichu;
            $update_Phucap->Trangthai = $request->status;
            if($update_Phucap->save())
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
