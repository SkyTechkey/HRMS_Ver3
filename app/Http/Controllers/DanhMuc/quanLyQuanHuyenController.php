<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuanLyQuanHuyen;
use App\Models\QuanLyTinhThanhPho;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuanhuyenExport;
use App\Imports\QuanhuyenImport;

class quanLyQuanHuyenController extends Controller
{

    public function index()
    {
        $danhsach = QuanLyQuanHuyen::all();
        $danhsach_tinhthanhpho = QuanLyTinhThanhPho::all();
        return view('Settings.Danhmuc.quanlyquanhuyen',compact('danhsach','danhsach_tinhthanhpho'));
    }

    public function store(Request $request)
    {
        $createQuanHuyen = new QuanLyQuanHuyen;
        $createQuanHuyen->Ten_quanhuyen = $request->name;
        $createQuanHuyen->ID_tinhthanhpho = $request->tinhthanhpho;
        $createQuanHuyen->Ghichu = $request->Ghichu;
        $createQuanHuyen->Trangthai = $request->status;
        if($createQuanHuyen->save())
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
        $deleteQuanHuyen = QuanLyQuanHuyen::find($id);

        if(!empty($deleteQuanHuyen))
        {
            $checkXaPhuong = $deleteQuanHuyen->xaphuong()->find($id);
            if(!empty($checkXaPhuong))
            {
                return back()->with('error',__('Không thể xóa. Dữ liệu này đã tồn tại ở quận huyện!'));
            }
            else
            {
                if($deleteQuanHuyen->delete())
                {
                return back()->with('success',__('Đã xóa dữ liệu thành công!'));
                }
                else
                {
                    return back()->with('error',__('Lỗi không thể xóa dữ liệu!'));
                }
            }
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
                Excel::import(new QuanhuyenImport,request()->file('file'));
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
        return Excel::download(new QuanhuyenExport, 'DS_QuanHuyen.xlsx');
    }
      public function update(Request $request, $id)
    {
        $update_Quanhuyen = QuanLyQuanHuyen::find($id);
        if(!empty($update_Quanhuyen)){
            $update_Quanhuyen->Ten_quanhuyen = $request->name;
            $update_Quanhuyen->ID_tinhthanhpho = $request->tinhthanhpho;
            $update_Quanhuyen->Ghichu = $request->Ghichu;
            $update_Quanhuyen->Trangthai = $request->status;
            if($update_Quanhuyen->save())
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
