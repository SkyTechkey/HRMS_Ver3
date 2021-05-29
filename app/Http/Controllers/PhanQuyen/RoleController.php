<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('Settings.QLQuyen.role',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        if($role->save()){

            return redirect()->route('role.index')->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return redirect()->route('role.index')->with('error',__('Lỗi không thể thêm dữ liệu!'));
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
        //
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

        try
        {
            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();
        // if(){
                return redirect()->route('role.index')->with('success',__('Đã cập nhật dữ liệu thành công!'));
       
            }
    catch( Role $exception)  {
        return back()->with('error',__('Lỗi không thể cập nhật dữ liệu!'));
      //  return redirect()->route('role.index')

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if(!empty($role)){
            if($role->delete()){
              ///  return redirect('settings/role')->with('success',__('Đã xóa dữ liệu thành công!'));
                //sư dụng cách này để thay thế
                return redirect()->route('role.index')->with('success',__('Đã xóa dữ liệu thành công!'));
            }
        }
        else
        {
            return redirect()->route('role.index')->with('error',__('Lỗi không thể xóa dữ liệu!'));
        }

    }
}
