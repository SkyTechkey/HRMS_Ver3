<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyXaPhuong;
use App\Models\QuanLyQuanHuyen;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\XaphuongExport;
use App\Imports\XaphuongImport;

class quanLyXaPhuongController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyXaPhuong::all();
        $danhsach_quanhuyen = QuanLyQuanHuyen::all();
        return view('Settings.Danhmuc.quanlyxaphuong',compact('danhsach','danhsach_quanhuyen'));
    }

    public function store(Request $request)
    {
        $createXaPhuong = new QuanLyXaPhuong;
        $createXaPhuong->Ten_xaphuong = $request->name;
        $createXaPhuong->ID_quanhuyen = $request->quanhuyen;
        $createXaPhuong->Ghichu = $request->Ghichu;
        $createXaPhuong->Trangthai = $request->status;
        if($createXaPhuong->save())
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
        $deleteXaPhuong = QuanLyXaPhuong::find($id);

        if(!empty($deleteXaPhuong))
        {
            if($deleteXaPhuong->delete())
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
                Excel::import(new XaphuongImport,request()->file('file'));
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
        return Excel::download(new XaphuongExport, 'DS_XaPhuong.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Xaphuong = QuanLyXaPhuong::find($id);
        if(!empty($update_Xaphuong)){
            $update_Xaphuong->Ten_xaphuong = $request->name;
            $update_Xaphuong->ID_quanhuyen = $request->quanhuyen;
            $update_Xaphuong->Ghichu = $request->Ghichu;
            $update_Xaphuong->Trangthai = $request->status;
            if($update_Xaphuong->save())
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
