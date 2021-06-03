<?php

namespace App\Http\Controllers\DaoTao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhoaDaoTao;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KhoadaotaoExport;
use App\Imports\KhoadaotaoImport;

class khoaDaoTaoController extends Controller
{

    public function index()
    {
        $danhsach = KhoaDaoTao::all();
        $danhsach_nhanvien = User::all();
        return view('Settings.Daotao.quanlykhoadaotao',compact('danhsach','danhsach_nhanvien'));
    }

    public function store(Request $request)
    {
        $createKhoaDaoTao = new KhoaDaoTao;
        $createKhoaDaoTao->Ten_khoadaotao = $request->name;
        $createKhoaDaoTao->Kynang_khoadaotao = $request->kynang;
        $createKhoaDaoTao->Quydinh_khoadaotao = $request->quydinh;
        $createKhoaDaoTao->Hinhthuc_khoadaotao = $request->hinhthuc;
        $createKhoaDaoTao->Doituong_khoadaotao = $request->doituong;
        $createKhoaDaoTao->ID_nhanvien = $request->iduser;
        $createKhoaDaoTao->ID_phongban = $request->idphongban;
        $createKhoaDaoTao->ID_chucvu = $request->chucvu;
        $createKhoaDaoTao->Sobuoi_khoadatao = $request->sobuoi;
        $createKhoaDaoTao->Noidung = $request->noidung;
        $createKhoaDaoTao->Muctieu = $request->muctieu;
        $createKhoaDaoTao->Ghichu = $request->Ghichu;
        $createKhoaDaoTao->Trangthai = $request->status;
        
        if($createKhoaDaoTao->save())
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
        $deleteKhoadaotao = KhoaDaoTao::find($id);

        if(!empty($deleteKhoadaotao))
        {
            if($deleteKhoadaotao->delete())
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
                Excel::import(new KhoadaotaoImport,request()->file('file'));
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
        return Excel::download(new KhoadataoExport, 'DS_KhoaDaoTao.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Khoadaotao = KhoaDaoTao::find($id);
        if(!empty($update_Khoadaotao)){
            $update_Khoadaotao->Ten_khoadaotao = $request->name;
            $update_Khoadaotao->Kynang_khoadaotao = $request->kynang;
            $update_Khoadaotao->Quydinh_khoadaotao = $request->quydinh;
            $update_Khoadaotao->Hinhthuc_khoadaotao = $request->hinhthuc;
            $update_Khoadaotao->Doituong_khoadaotao = $request->doituong;
            $update_Khoadaotao->ID_nhanvien = $request->iduser;
            $update_Khoadaotao->ID_phongban = $request->idphongban;
            $update_Khoadaotao->ID_chucvu = $request->chucvu;
            $update_Khoadaotao->Sobuoi_khoadatao = $request->sobuoi;
            $update_Khoadaotao->Noidung = $request->noidung;
            $update_Khoadaotao->Muctieu = $request->muctieu;
            $update_Khoadaotao->Ghichu = $request->Ghichu;
            $update_Khoadaotao->Trangthai = $request->status;
            if($update_Khoadaotao->save())
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
