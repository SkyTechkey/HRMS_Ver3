<?php

namespace App\Http\Controllers\QLQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\Permissionimport;

class permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsach = Permission::all();
        return view('Settings.QLQuyen.permission',compact('danhsach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createPermission = new Permission;
        $createPermission->name = $request->name;
        
        if($createPermission->save()){
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
        $deletePermission = Permission::find($id);
        
        if(!empty($deletePermission)){
            if($deletePermission->delete()){

            
            
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
            Excel::import(new PermissionImport,request()->file('file'));
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else{
            return back()->with('error',__('Vui lòng chọn tệp'));
        }
    }
    public function export() 
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
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
        $update_Permission = Permission::find($id);
        if(!empty($update_Permission)){
            $update_Permission->name = $request->name;
            
            if($update_Permission->save()){
                
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
