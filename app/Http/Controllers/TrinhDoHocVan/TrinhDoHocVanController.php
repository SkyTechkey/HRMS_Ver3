<?php

namespace App\Http\Controllers\TrinhDoHocVan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TrinhDoHocVan;

use App\Exports\TrinhDoHocVanExport;
use App\Imports\TrinhDoHocVanImport;
use Maatwebsite\Excel\Facades\Excel;
class TrinhDoHocVanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $hocVan = TrinhDoHocVan::all();
        return view('admin.hocvan.danhsach',compact('hocVan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_trinhdohocvan = new TrinhDoHocVan;
        $list_trinhdohocvan->Ten_Trinhdohocvan = $request->name;
        $list_trinhdohocvan->status = $request->status;
        if($list_trinhdohocvan->save()){
            return redirect('nhanvien/hocvan')->with('success',__('Bạn đã thêm trình độ học vấn mới thành công'));
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
        $edit_hocVan = TrinhDoHocVan::find($id);
        if(!empty($edit_hocVan)){
            $edit_hocVan->Ten_Trinhdohocvan = $request->name;
            if($edit_hocVan->save()){
                return redirect('nhanvien/hocvan')->with('success',__('Bạn đã chỉnh sửa tên học vấn mới thành công'));
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
            Excel::import(new TrinhDoHocVanImport,request()->file('file'));
           
            return redirect('nhanvien/hocvan')->with('success',__('Bạn đã thêm học vấn mới thành công'));
        }
        else{
            return redirect('nhanvien/hocvan')->with('success',__('Vui lòng chọn tệp'));
        }
        
           
        
    }
    public function export() 
    {
        return Excel::download(new TrinhDoHocVanExport, 'hocvan.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_hocVan = TrinhDoHocVan::find($id);
        if(!empty($destroy_hocVan)){
            $destroy_hocVan->delete();
            return redirect('nhanvien/hocvan')->with('success',__('Bạn đã xóa học vấn thành công'));
        }
        else{
            return view(401);
        }
    }
    public function destroyAll(){
        $tbl_trinhdohocvan = TrinhDoHocVan::all();
        if($tbl_trinhdohocvan){
            TrinhDoHocVan::whereNotNull('id')->delete();
            return redirect('nhanvien/hocvan')->with('success',__('Bạn đã xóa tất cả dân tộc mới thành công'));
        }
    }
}
