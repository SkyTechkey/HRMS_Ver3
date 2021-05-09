<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ChucVu;

use App\Exports\ChucVuExport;
use App\Imports\ChucVuImport;
use Maatwebsite\Excel\Facades\Excel;
class QuanlyChucvuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_chucVu = ChucVu::all();
        return view('admin.chucvu.danhsach',compact('list_chucVu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $list_chucVu = new ChucVu;
        $list_chucVu->Tenchucvu = $request->name;
        $list_chucVu->status = $request->status;
        $list_chucVu->Luong = $request->luong;
        if($list_chucVu->save()){
            return redirect('nhanvien/chucvu')->with('success',__('Bạn đã thêm chức vụ mới thành công'));
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
        $edit_chucVu = ChucVu::find($id);
        if(!empty($edit_chucVu)){
            $edit_chucVu->Tenchucvu = $request->name;
            $edit_chucVu->Luong = $request->luong;
            $edit_chucVu->status = $request->status;
            if($edit_chucVu->save()){
                return redirect('nhanvien/chucvu')->with('success',__('Bạn đã chỉnh sửa tên chức vụ thành công'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_chucVu = ChucVu::find($id);
        if(!empty($destroy_chucVu)){
            $destroy_chucVu->delete();
            return redirect('nhanvien/chucvu')->with('success',__('Bạn đã xóa tên chức vụ thành công'));
        }
        else{
            return view(401);
        }
    }
    public function import() 
    {
        if(!empty(request()->file('file')))
        {
            Excel::import(new ChucVuImport,request()->file('file'));
           
            return redirect('nhanvien/chucvu')->with('success',__('Bạn đã thêm chức vụ mới thành công'));
        }
        else{
            return redirect('nhanvien/chucvu')->with('success',__('Vui lòng chọn tệp'));
        }
        
           
        
    }
    public function export() 
    {
        return Excel::download(new ChucVuExport, 'chucvu.xlsx');
    }
}
