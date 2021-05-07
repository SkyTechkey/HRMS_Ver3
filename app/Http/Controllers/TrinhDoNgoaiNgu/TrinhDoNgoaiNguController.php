<?php

namespace App\Http\Controllers\TrinhDoNgoaiNgu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrinhDoNgoaiNgu;

use App\Exports\TrinhDoNgoaiNguExport;
use App\Imports\TrinhDoNgoaiNguImport;
use Maatwebsite\Excel\Facades\Excel;
class TrinhDoNgoaiNguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $list_trinhDoNgoaiNgu = TrinhDoNgoaiNgu::all();
        return view('admin.trinhdongoaingu.danhsach',compact('list_trinhDoNgoaiNgu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_trinhDoNgoaiNgu = new TrinhDoNgoaiNgu;
        $list_trinhDoNgoaiNgu->Tentrinhdongoaingu_Trinhdongoaingu = $request->name;
        $list_trinhDoNgoaiNgu->status = $request->status;
        if($list_trinhDoNgoaiNgu->save()){
            return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Bạn đã thêm trình độ ngoại ngữ mới thành công'));
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
        $edit_trinhDoNgoaiNgu = TrinhDoNgoaiNgu::find($id);
        if(!empty($edit_trinhDoNgoaiNgu)){
            $edit_trinhDoNgoaiNgu->Tentrinhdongoaingu_Trinhdongoaingu = $request->name;
            if($edit_trinhDoNgoaiNgu->save()){
                return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Bạn đã chỉnh sửa trình độ ngoại ngữ thành công'));
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
            Excel::import(new TrinhDoNgoaiNguImport,request()->file('file'));
           
            return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Bạn đã thêm trình độ ngoại ngữ mới thành công'));
        }
        else{
            return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Vui lòng chọn tệp'));
        }
        
           
        
    }
    public function export() 
    {
        return Excel::download(new TrinhDoNgoaiNguExport, 'trinhdongoaingu.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_trinhDoNgoaiNgu = TrinhDoNgoaiNgu::find($id);
        if(!empty($destroy_trinhDoNgoaiNgu)){
            $destroy_trinhDoNgoaiNgu->delete();
            return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Bạn đã xóa trình đọ ngôn ngữ thành công'));
        }
        else{
            return view(401);
        }
    }
    public function destroyAll(){
        $tbl_trinhDoNgoaiNgu = TrinhDoNgoaiNgu::all();
        if($tbl_trinhDoNgoaiNgu){
            TrinhDoNgoaiNgu::whereNotNull('id')->delete();
            return redirect('nhanvien/trinhdo-ngoaingu')->with('success',__('Bạn đã xóa tất cả trình độ ngoại ngữ thành công'));
        }
    }
}
