<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl_permission = Permission::all();
        return view('admin.PhanQuyen.permission',compact('tbl_permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tbl_permission = new Permission;
        $tbl_permission->name = $request->name;
        if($tbl_permission->save()){
            return redirect()->back()->with('success',__('Bạn đã thêm chức năng mới thành công'));
        }
        else{
            return redirect()->back()->with('success',__('Bạn đã thêm chức năng mới thất bại'));
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
        $tbl_permission = Permission::find($id);
        if(!empty($tbl_permission)){
            $tbl_permission->name = $request->name;
            if($tbl_permission->save()){
                return redirect()->back()->with('success',__('Bạn đã sửa vai trò thành công'));
            }
            else{
                return redirect()->back()->with('success',__('Bạn đã thêm chức năng mới thất bại'));
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
        $tbl_permission = Permission::find($id);
        if(!empty($tbl_permission)){
            if($tbl_permission->delete()){
                return redirect()->back()->with('success',__('Bạn đã xóa chức năng thành công'));
            }
        }
        else{
            return view('401');
        }
    }
}
