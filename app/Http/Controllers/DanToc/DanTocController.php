<?php

namespace App\Http\Controllers\DanToc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DanToc;

use App\Exports\DanTocExport;
use App\Imports\DanTocImport;
use Maatwebsite\Excel\Facades\Excel;
class DanTocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $list_danToc = DanToc::all();
        return view('admin.dantoc.danhsach',compact('list_danToc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tbl_danToc = new DanToc;
        $tbl_danToc->Tendantoc_Dantoc = $request->name;
        $tbl_danToc->status = $request->status;
        if($tbl_danToc->save()){
            return redirect('nhanvien/dantoc')->with('success',__('Bạn đã thêm tên dân tộc mới thành công'));
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
        $edit_danToc = DanToc::find($id);
        if(!empty($edit_danToc)){
            $edit_danToc->Tendantoc_Dantoc = $request->name;
            if($edit_danToc->save()){
                return redirect('nhanvien/dantoc')->with('success',__('Bạn đã chỉnh sửa tên dân tộc mới thành công'));
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
        Excel::import(new DanTocImport,request()->file('file'));
           
        return redirect()->back();
    }
    public function export() 
    {
        return Excel::download(new DanTocExport, 'dantoc.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_danToc = DanToc::find($id);
        if(!empty($destroy_danToc)){
            $destroy_danToc->delete();
            return redirect('nhanvien/dantoc')->with('success',__('Bạn đã xóa tên dân tộc mới thành công'));
        }
        else{
            return view(401);
        }
    }
    public function destroyAll(){
        $tbl_danToc = DanToc::all();
        if($tbl_danToc){
            DanToc::whereNotNull('id')->delete();
            return redirect('nhanvien/dantoc')->with('success',__('Bạn đã xóa tất cả dân tộc mới thành công'));
        }
    }
}
