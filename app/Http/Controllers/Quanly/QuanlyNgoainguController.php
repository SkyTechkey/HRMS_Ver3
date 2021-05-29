<?php

namespace App\Http\Controllers\Quanly;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ngoaingu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NgoainguExport;
use App\Imports\NgoainguImport;

class QuanlyNgoainguController extends Controller
{
    public function index(Request $request){
		    $list_trinhDoNgoaiNgu = Ngoaingu::all();
	      return view('admin.Nhansu.ngoaingu', compact('ngoaingus'));
    }
    public function create(Request $request){
      $ngoaingus = new Ngoaingu;
        $ngoaingus->TenNN_Ngoaingu = $request->TenNN_Ngoaingu;
        if($ngoaingus->save()){
  
            return redirect('ngoaingu')->with('success',__('Thành công'));
        }
        
    }

		public function destroy($id){
			$ngoaingus = Ngoaingu::find($id);
        if(!empty($ngoaingus)){
            if($ngoaingus->delete()){
                return redirect('ngoaingu')->with('success',__('Thành công'));
            }
        }
        else{
            return view('errors.401');
        }
		}

        public function destroyAll(){
                $ngoaingus = Ngoaingu::All();
                if($ngoaingus){
                    Ngoaingu::whereNotNull('id')->delete();
                    return redirect('ngoaingu')->with('success',__('Thành công'));
            }
            else{
                return view('errors.401');
            }
		}

		public function edit($id, Request $request)
		{
			$ngoaingus = Ngoaingu::find($id);
        $ngoaingus->TenNN_Ngoaingu = $request->TenNN_Ngoaingu;
        if($ngoaingus->save()){
            
            return redirect('ngoaingu')->with('success',__('Thành công'));
        }
			
		}

    public function export() 
    {
        return Excel::download(new NgoainguExport, 'ngoaingu.xlsx');
    }
   
    public function import() 
    {
        if (!empty(request()->file('file'))){
            Excel::import(new NgoainguImport,request()->file('file'));
            return redirect('ngoaingu')->with('success',__('Thành công'));
        }
        else{
            return redirect('ngoaingu')->with('success',__('Vui lòng chọn tệp'));
        }
    }
			
}
