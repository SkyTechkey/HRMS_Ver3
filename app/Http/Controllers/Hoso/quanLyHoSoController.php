<?php

namespace App\Http\Controllers\Hoso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoSo;
use App\Models\LoaiHoSo;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HosoExport;
use App\Imports\HosoImport;

class quanLyHoSoController extends Controller
{
    public function index()
    {
        $danhsach = HoSo::all();
        $danhsach_nhanvien = User::all();
        $danhsach_loaihoso = LoaiHoSo::all();
        return view('Settings.Hoso.quanlyhoso',compact('danhsach','danhsach_nhanvien','danhsach_loaihoso'));
    }

    public function store(Request $request)
    {
        $createHoSo = new HoSo;
        $createHoSo->ID_username = $request->iduser;
        $createHoSo->ID_loaihoso = $request->idloaihoso;
        $createHoSo->Ghichu = $request->Ghichu;
        $createHoSo->Trangthai = $request->status;
        if($createHoSo->save())
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
        $deleteHoso = HoSo::find($id);

        if(!empty($deleteHoso))
        {
            if($deleteHoso->delete())
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
    
    public function export()
    {
        return Excel::download(new HosoExport, 'DS_Hoso.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Hoso = HoSo::find($id);
        if(!empty($update_Hoso)){
            $update_Hoso->ID_username = $request->id_user;
            $update_Hoso->ID_loaihoso = $request->id_loaihoso;
            $update_Hoso->Ghichu = $request->Ghichu;
            $update_Hoso->Trangthai = $request->status;
            if($update_Hoso->save())
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
