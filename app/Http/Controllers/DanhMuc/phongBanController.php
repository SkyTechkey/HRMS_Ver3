<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhongBan;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhongbanExport;
use App\Imports\PhongbanImport;

class phongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsach = PhongBan::all();
        
        return view('Settings.Danhmuc.phongban',compact('danhsach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $createPhongBan = new PhongBan;
        $createPhongBan->Ten_phongban = $request->name;       
        $createPhongBan->Trangthai = $request->status;
        $createPhongBan->Chinhanh = $request->get('chinhanh');
        if($createPhongBan->save()){
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else{
            return back()->with('error',__('Lỗi không thể thêm dữ liệu!'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $deletePhongBan = PhongBan::find($id);
        
        if(!empty($deletePhongBan)){
            if($deletePhongBan->delete()){

            
            
                return back()->with('success',__('Đã xóa dữ liệu thành công!'));
        
            }
            else{
                return back()->with('error',__('Lỗi không thể xóa dữ liệu!'));
            }
        }
        else{
            return view(401);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }
    public function import() 
    {
        if (!empty(request()->file('file'))){
            Excel::import(new PhongbanImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else{
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export() 
    {
        return Excel::download(new PhongbanExport, 'phongban.xlsx');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_Phongban = PhongBan::find($id);
        if(!empty($update_Phongban)){
            $update_Phongban->Ten_phongban = $request->name;       
            $update_Phongban->Trangthai = $request->status;
            $update_Phongban->Chinhanh = $request->get('chinhanh');
            if($update_Phongban->save()){
                
                return back()->with('success',__('Đã cập nhập dữ liệu thành công!'));
            }
            else{
                return back()->with('error',__('Lỗi không thể cập nhập dữ liệu!'));
            }
        }
        else{
            return view(401);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
