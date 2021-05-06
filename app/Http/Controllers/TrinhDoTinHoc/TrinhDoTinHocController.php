<?php

namespace App\Http\Controllers\TrinhDoTinHoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TrinhDoTinHoc;

use App\Exports\TrinhDoTinHocExport;
use App\Imports\TrinhDoTinHocImport;
use Maatwebsite\Excel\Facades\Excel;
class TrinhDoTinHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tinHoc = TrinhDoTinHoc::all();
        return view('admin.tinhoc.danhsach',compact('tinHoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_trinhdotinhoc = new TrinhDoTinHoc;
        $list_trinhdotinhoc->Ten_Trinhdotinhoc = $request->name;
        $list_trinhdotinhoc->status = $request->status;
        if($list_trinhdotinhoc->save()){
            return redirect('nhanvien/tinhoc')->with('success',__('Bạn đã thêm trình độ tin học mới thành công'));
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
        $edit_tinHoc = TrinhDoTinHoc::find($id);
        if(!empty($edit_tinHoc)){
            $edit_tinHoc->Ten_Trinhdotinhoc = $request->name;
            if($edit_tinHoc->save()){
                return redirect('nhanvien/tinhoc')->with('success',__('Bạn đã chỉnh sửa tên trình độ tin học mới thành công'));
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
            Excel::import(new TrinhDoTinHocImport,request()->file('file'));
           
            return redirect('nhanvien/tinhoc')->with('success',__('Bạn đã thêm tin học mới thành công'));
        }
        else{
            return redirect('nhanvien/tinhoc')->with('success',__('Vui lòng chọn tệp'));
        }
        
           
        
    }
    public function export() 
    {
        return Excel::download(new TrinhDoTinHocExport, 'tinhoc.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_tinHoc = TrinhDoTinHoc::find($id);
        if(!empty($destroy_tinHoc)){
            $destroy_tinHoc->delete();
            return redirect('nhanvien/tinhoc')->with('success',__('Bạn đã xóa tin học thành công'));
        }
        else{
            return view(401);
        }
    }
    public function destroyAll(){
        $tbl_trinhdotinhoc = TrinhDoTinHoc::all();
        if($tbl_trinhdotinhoc){
            TrinhDoTinHoc::whereNotNull('id')->delete();
            return redirect('nhanvien/tinhoc')->with('success',__('Bạn đã xóa tất cả tin học mới thành công'));
        }
    }
}
