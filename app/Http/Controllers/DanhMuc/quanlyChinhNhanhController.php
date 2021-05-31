<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanlyChinhanh;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChiNhanhExport;
use App\Imports\ChinhanhImport;

class quanlyChinhNhanhController extends Controller
{

    public function index()
    {
        $danhsach = QuanlyChinhanh::all();
        return view('Settings.Danhmuc.quanlychinhanh',compact('danhsach'));
    }

    public function store(Request $request)
    {
        $createchinhanh = new QuanlyChinhanh;
        $createchinhanh->Tenchinhanh = $request->name;
        $createchinhanh->Diachi = $request->Diachi;
        $createchinhanh->Tennguoidungdau = $request->Tennguoidungdau;
        $createchinhanh->Email = $request->Email;
        $createchinhanh->Sodienthoai = $request->Sodienthoai;
        $createchinhanh->Chucvu = $request->Chucvu;
        $createchinhanh->Trangthai = $request->status;
        $createchinhanh->Ghichu = $request->Ghichu;
        if($createchinhanh->save())
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
        $deletechinhanh = QuanlyChinhanh::find($id);

        if(!empty($deletechinhanh))
        {
            if($deletechinhanh->delete())
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
            Excel::import(new ChinhanhImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export()
    {
        return Excel::download(new ChiNhanhExport, 'DS_ChiNhanh.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_chinhanh = QuanlyChinhanh::find($id);
        if(!empty($update_chinhanh)){
            $update_chinhanh->Tenchinhanh = $request->name;
            $update_chinhanh->Diachi = $request->Diachi;
            $update_chinhanh->Tennguoidungdau = $request->Tennguoidungdau;
            $update_chinhanh->Email = $request->Email;
            $update_chinhanh->Sodienthoai = $request->Sodienthoai;
            $update_chinhanh->Chucvu = $request->Chucvu;
            $update_chinhanh->Ghichu = $request->ghichu;
            $update_chinhanh->Trangthai = $request->status;
            if($update_chinhanh->save())
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
