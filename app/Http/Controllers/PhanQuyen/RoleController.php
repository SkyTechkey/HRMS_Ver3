<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
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
        return view('admin.PhanQuyen.role',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        if($role->save()){
            return redirect()->back()->with('success',__('Bạn đã thêm vai trò mới thành công'));
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
        $role = Role::find($id);
        if(!empty($role)){
            if($role->delete()){
                return redirect()->back()->with('success',__('Bạn đã xóa vai trò thành công'));
            }
        }
        else{
            return view('401');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $role = Role::find($id);
        if(!empty($role)){
            $role->name = $request->name;
            if($role->save()){
                return redirect()->back()->with('success',__('Bạn đã sửa vai trò thành công'));
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
    
    
}
