<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuyenDung;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TuyendungExport;
use App\Imports\TuyendungImport;

class tuyenDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsach = TuyenDung::all();
        
        return view('Settings.Danhmuc.tuyendung',compact('danhsach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $createTuyenDung = new TuyenDung;
        $createTuyenDung->Ten_vitrituyendung = $request->name;       
        $createTuyenDung->Trangthai = $request->get('status');
        $createTuyenDung->Ghichu = $request->ghichu;
        if($createTuyenDung->save()){
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
        $deleteTuyenDung = TuyenDung::find($id);
        
        if(!empty($deleteTuyenDung)){
            if($deleteTuyenDung->delete()){

            
            
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
            Excel::import(new TuyendungImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else{
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export() 
    {
        return Excel::download(new TuyendungExport, 'vitrituyendung.xlsx');
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
        $update_Tuyendung = TuyenDung::find($id);
        if(!empty($update_Tuyendung)){
            $update_Tuyendung->Ten_vitrituyendung = $request->name;       
            $update_Tuyendung->Trangthai = $request->get('status');
            $update_Tuyendung->Ghichu = $request->ghichu;
            if($update_Tuyendung->save()){
                
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
