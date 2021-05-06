<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quoctich;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuoctichExport;
use App\Imports\QuoctichImport;

class QuanlyQuoctichController extends Controller
{
    public function index(Request $request){
		# $request->user()->authorizeRoles(['admin']);
				$quoctichs = Quoctich::all();
	      return view('admin.Nhansu.quoctich', compact('quoctichs'));
    }
    public function create(Request $request){
      $quoctichs = new Quoctich;
        $quoctichs->TenQT_Quoctich = $request->TenQT_Quoctich;
        if($quoctichs->save()){
  
            return redirect('quoctich')->with('success',__('Thành công'));
        }
        
    }

		public function destroy($id){
			$quoctichs = Quoctich::find($id);
        if(!empty($quoctichs)){
            if($quoctichs->delete()){
                return redirect('quoctich')->with('success',__('Thành công'));
            }
        }
        else{
            return view('errors.401');
        }
		}

        public function destroyAll(){
			$quoctichs = Quoctich::All();
            if($quoctichs){
                Quoctich::whereNotNull('id')->delete();
                return redirect('quoctich')->with('success',__('Thành công'));
        }
        else{
            return view('errors.401');
        }
		}

		public function edit($id, Request $request)
		{
			$quoctichs = Quoctich::find($id);
        $quoctichs->TenQT_Quoctich = $request->TenQT_Quoctich;
        if($quoctichs->save()){
            
            return redirect('quoctich')->with('success',__('Thành công'));
        }
			
		}

    public function export() 
    {
        return Excel::download(new QuoctichExport, 'quoctich.xlsx');
    }
   
    public function import() 
    {
        if (!empty(request()->file('file'))){
            Excel::import(new QuoctichImport,request()->file('file'));
            return redirect('quoctich')->with('success',__('Thành công'));
        }
        else{
            return redirect('quoctich')->with('success',__('Vui lòng chọn tệp'));
        }
    }
			
}
