<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tongiao;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TongiaoExport;
use App\Imports\TongiaoImport;

class QuanlyTongiaoController extends Controller
{
    public function index(Request $request){
		# $request->user()->authorizeRoles(['admin']);
				$tongiaos = Tongiao::all();
	      return view('admin.Nhansu.tongiao', compact('tongiaos'));
    }
    public function create(Request $request){
      $tongiaos = new Tongiao;
        $tongiaos->TenTG_Tongiao = $request->TenTG_Tongiao;
        if($tongiaos->save()){
  
            return redirect('tongiao')->with('success',__('Thành công'));
        }
        
    }

		public function destroy($id){
			$tongiaos = Tongiao::find($id);
        if(!empty($tongiaos)){
            if($tongiaos->delete()){
                return redirect('tongiao')->with('success',__('Thành công'));
            }
        }
        else{
            return view('errors.401');
        }
		}

        public function destroyAll(){
			$tongiaos = Tongiao::All();
            if($tongiaos){
                Tongiao::whereNotNull('id')->delete();
                return redirect('tongiao')->with('success',__('Thành công'));
        }
        else{
            return view('errors.401');
        }
		}

		public function edit($id, Request $request)
		{
			$tongiaos = Tongiao::find($id);
        $tongiaos->TenTG_Tongiao = $request->TenTG_Tongiao;
        if($tongiaos->save()){
            
            return redirect('tongiao')->with('success',__('Thành công'));
        }
			
		}

    public function export() 
    {
        return Excel::download(new TongiaoExport, 'tongiao.xlsx');
    }
   
    public function import() 
    {
        if (!empty(request()->file('file'))){
            Excel::import(new TongiaoImport,request()->file('file'));
            return redirect('tongiao')->with('success',__('Thành công'));
        }
        else{
            return redirect('tongiao')->with('success',__('Vui lòng chọn tệp'));
        }
    }
			
}
