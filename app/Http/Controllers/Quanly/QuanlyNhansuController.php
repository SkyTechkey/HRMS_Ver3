<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Tongiao;
use App\Quoctich;
use App\Ngoaingu;
use Spatie\Permission\Models\Role;

class QuanlyNhansuController extends Controller
{
    public function index(Request $request){
		# $request->user()->authorizeRoles(['admin']);
        $getData = DB::table('users')->select('*')->get();
				$users = User::all();
    		$roles = Role::all();
				$tongiaos = Tongiao::all();
				$quoctichs = Quoctich::all();
				$ngoaingus = Ngoaingu::all();

	    return view('admin.Nhansu.nhansu', compact('users', 'roles', 'tongiaos', 'quoctichs', 'ngoaingus'))->with('listnhansu',$getData);
    }
    public function create(){
        return view('admin.Nhansu.create');
    }

    public function store(Request $request){
			//Lấy giá trị nhân sự đã nhập
			$allRequest  = $request->all();
			$name  = $allRequest['name'];
			$email = $allRequest['email'];
			$role = $allRequest['role'];
			$salary = $allRequest['salary'];
			$phone = $allRequest['phone'];
			
			//Gán giá trị vào array
			$dataInsertToDatabase = array(
				'name'  => $name,
				'email' => $email,
				'role' => $role,
				'salary' => $salary,
				'phone' => $phone,
			);
			
			$insertData = DB::table('users')->insert($dataInsertToDatabase);
			
			//Kiểm tra Insert để trả về một thông báo
			if ($insertData) {
				Session::flash('success', 'Thành công!');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
			return redirect('nhansu');
		}
		public function destroy($id){
			$deleteData = DB::table('users')->where('id', '=', $id)->delete();
	
			//Kiểm tra lệnh delete để trả về một thông báo
			if ($deleteData) {
				Session::flash('success', 'Thành công!');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
			return redirect('nhansu');
		}

		public function edit($id)
		{
			$getData = DB::table('users')->select('id', 'name','email','phone', 'role', 'salary')->where('id','=',$id)->get();
			$users = User::all();
    	$roles = Role::all();
			$tongiaos = Tongiao::all();
			$quoctichs = Quoctich::all();
			$ngoaingus = Ngoaingu::all();
			return view('admin.Nhansu.edit', compact('users', 'roles', 'tongiaos', 'quoctichs', 'ngoaingus'))->with('getData', $getData);
			
		}

		public function update(Request $request, $id)
		{
			$getData = DB::table('users')->select('id', 'name','email','phone', 'role', 'salary', 'tongiao', 'quoctich', 'ngoaingu')->where('id','=',$id)->get();
			$users = User::all();
    	$roles = Role::all();
			$tongiaos = Tongiao::all();
			$quoctichs = Quoctich::all();
			$ngoaingus = Ngoaingu::all();
			$updateData = DB::table('users')->where('id', $request->id)->update([
				'id' => $request->id,
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'role' => $request->role,
				'salary' => $request->salary,
				'tongiao' => $request->tongiao,
				'quoctich' => $request->quoctich,
				'ngoaingu' => $request->ngoaingu,
			]);
			
			//Kiểm tra lệnh update để trả về một thông báo
			if ($updateData) {
				Session::flash('success', 'Thành công!');
				return redirect('nhansu');
			}else {                        
				Session::flash('error', 'Thất bại!');
			}
			
			//Thực hiện chuyển trang
		 	//return redirect('nhansu')->with('update', $updateData);
			 return view('admin.Nhansu.edit', compact('users', 'roles', 'tongiaos', 'quoctichs', 'ngoaingus'))->with('getData', $getData);
			//dd($updateData);
		}
}
