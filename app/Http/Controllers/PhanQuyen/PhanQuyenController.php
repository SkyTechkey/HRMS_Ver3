<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PhanQuyenController extends Controller
{
    public function getPhanQuyen()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.PhanQuyen.phanquyen',compact('role','permission'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRole()
    {
        $role = Role::all();
        return view('Settings.QLQuyen.role',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        if($role->save()){

            return redirect('settings/role')->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        if(!empty($role)){
            if($role->delete()){
                return redirect('settings/role')->with('success',__('Đã xóa dữ liệu thành công!'));
            }
        }
        else{
            return view('errors.401');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editRole(Request $request,$id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        if($role->save()){

            return redirect('settings/role')->with('success',__('Bạn đã sửa vai trò mới thành công'));
        }
    }



    public function getChucNang(){
        $chucNang = Permission::all();
        return view('admin.PhanQuyen.permission',compact('chucNang'));
    }


    public function createChucNang(Request $request){
        $chucNang = new Permission;
        $chucNang->name = $request->name;

        if($chucNang->save()){
            return redirect('chucnang')->with('success',__('Đã thêm thành công chức năng'));
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editChucNang(Request $request,$id)
    {
        $chucNang = Permission::find($id);
        $chucNang->name = $request->name;
        if($chucNang->save()){

            return redirect('chucnang')->with('success',__('Bạn đã sửa chức năng mới thành công'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteChucNang($id)
    {
        $chucNang = Permission::find($id);
        if(!empty($chucNang)){
            if($chucNang->delete()){
                return redirect('chucnang')->with('success',__('Đã xóa thành công chức năng'));
            }
        }
        else{
            return view('errors.401');
        }

    }

    public function index(){

        $role = Role::all();
        return view('PhanQuyen.role_user',compact('role'));
    }
    public function getListRoleUser(){
        $user = User::all();
        $role = Role::all();
        return view('PhanQuyen.list_user_role',compact('user','role'));
    }

    public function postEditRoleUser(Request $request, $id){
        $user = User::find($id);
        $userRoleOld = json_decode($user->role);
        $user->role =  json_encode($request->get('role'));
        if($userRoleOld == null){
           $user->assignRole($request->get('role'));
           $user->save();
        }
        else{
            $userRoleNew = json_decode($user->role);
            $checkUserRole = array_diff($userRoleOld,$userRoleNew);
            if(count($userRoleNew) > count($userRoleOld)){
                $user->assignRole($userRoleNew);
                $user->save();
                return redirect()->back()->with('success',__('Đã cập nhập thành công vai trò cho nhân viên'));
            }
            else{
                $user->syncRoles($userRoleNew);
                $user->save();
                return redirect()->back()->with('success',__('Đã cập nhập thành công vai trò cho nhân viên'));
            }
        }

    }
    public function editRolePermission(Request $request ,$id){
        $role = Role::find($id);
        $permission[] = $request->get('permission');
        $role->syncPermissions($permission);
        return redirect()->back()->with('success',__('Đã cập nhập thành công chức năng cho vai trò'));


    }
}
