<?php

namespace App\Http\Controllers\Hoso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiHoSo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LoaihosoExport;
use App\Imports\LoaihosoImport;

class quanLyLoaiHoSoController extends Controller
{
    public function index()
    {
        $danhsach = LoaiHoSo::all(); 
        return view('Settings.Hoso.quanlyloaihoso',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createLoaiHoSo = new LoaiHoSo;
        $createLoaiHoSo->Ten_loaihoso = $request->name;
        $createLoaiHoSo->Ghichu = $request->Ghichu;
        $createLoaiHoSo->Trangthai = $request->status;
        if($createLoaiHoSo->save())
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
        $deleteLoaiHoSo = LoaiHoSo::find($id);
        if(!empty($deleteLoaiHoSo))
        {
            $checkHoSo = $deleteLoaiHoSo->hoso()->find($id);
            if(!empty($checkHoSo))
            {
                return back()->with('error',__('Không thể xóa. Dữ liệu này đã tồn tại ở hồ sơ!'));
            }
            else
            {
                if($deleteLoaiHoSo->delete())
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
                Excel::import(new LoaihosoImport,request()->file('file'));
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
        return Excel::download(new LoaihosoExport, 'DS_Loaihoso.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Loaihoso = LoaiHoSo::find($id);
        if(!empty($update_Loaihoso)){
            $update_Loaihoso->Ten_loaihoso = $request->name; 
            $update_Loaihoso->Ghichu = $request->Ghichu;
            $update_Loaihoso->Trangthai = $request->status;
            if($update_Loaihoso->save())
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
