<?php

namespace App\Http\Controllers\ViTriTuyenDung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViTriTuyenDung;

use App\Exports\ViTriTuyenDungExport;
use App\Imports\ViTriTuyenDungImport;
use Maatwebsite\Excel\Facades\Excel;
class ViTriTuyenDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $list_viTriTuyenDung = ViTriTuyenDung::all();
        return view('admin.vitrituyendung.danhsach',compact('list_viTriTuyenDung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_viTriTuyenDung = new ViTriTuyenDung;
        $list_viTriTuyenDung->Tenvitrituyendung_Vitrituyendung = $request->name;
        $list_viTriTuyenDung->Tenviettat = $request->tenVietTat;
        $list_viTriTuyenDung->status = $request->status;
        if($list_viTriTuyenDung->save()){
            return redirect('nhanvien/vitri-tuyendung')->with('success',__('Bạn đã thêm vị trí tuyển dụng mới thành công'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Request $request,$id)
    {
        $edit_viTriTuyenDung = ViTriTuyenDung::find($id);
        if(!empty($edit_viTriTuyenDung)){
            $edit_viTriTuyenDung->Tenvitrituyendung_Vitrituyendung = $request->name;
            $edit_viTriTuyenDung->Tenviettat = $request->tenVietTat;
            if($edit_viTriTuyenDung->save()){
                return redirect('nhanvien/vitri-tuyendung')->with('success',__('Bạn đã chỉnh sửa vị trí tuyền dụng thành công'));
            }

        }
        else{
            return view('401');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import() 
    {
        if(!empty(request()->file('file')))
        {
            Excel::import(new ViTriTuyenDungImport,request()->file('file'));
           
            return redirect('nhanvien/vitri-tuyendung')->with('success',__('Bạn đã thêm vi trí tuyển dụng mới thành công'));
        }
        else{
            return redirect('nhanvien/vitri-tuyendung')->with('success',__('Vui lòng chọn tệp'));
        }
        
           
        
    }
    public function export() 
    {
        return Excel::download(new ViTriTuyenDungExport, 'vitrituyendung.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_viTriTuyenDung = ViTriTuyenDung::find($id);
        if(!empty($destroy_viTriTuyenDung)){
            $destroy_viTriTuyenDung->delete();
            return redirect('nhanvien/vitri-tuyendung')->with('success',__('Bạn đã xóa vị trí tuyển dụng thành công'));
        }
        else{
            return view(401);
        }
    }
    public function destroyAll(){
        $tbl_viTriTuyenDung = ViTriTuyenDung::all();
        if($tbl_viTriTuyenDung){
            ViTriTuyenDung::whereNotNull('id')->delete();
            return redirect('nhanvien/vitri-tuyendung')->with('success',__('Bạn đã xóa tất cả vị trí tuyển dụng thành công'));
        }
    }
}
