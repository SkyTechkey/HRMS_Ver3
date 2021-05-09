<?php

namespace App\Http\Controllers\PhongBan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhongBan;
use App\ChiNhanh;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhongbanExport;
use App\Imports\PhongBanImport;
class PhongBanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongban = PhongBan::all();
        $branch = ChiNhanh::all();
        return view('admin.Department.danhsach',compact('phongban','branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request )
    {
        
        $phongban = new PhongBan;
        
        $phongban->Tenphongban = $request->name;
        $phongban->Tenchinhanh = $request->get('chiNhanh');
        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $phongban->Tinhtrang = "Hoạt động";
        }
        else if($checkActiveOrClose == 'close'){
            $phongban->Tinhtrang = "Tạm ngừng";
        }
        
        if($phongban->save()){
            
            

            return redirect('phongban')->with('success',__('Bạn đã thêm phòng ban mới thành công'));
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $editPhongBan = PhongBan::find($id);
        
        if(empty($editPhongBan)){
            return view('errors.401');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postSua(Request $request,$id)
    {
       
        
        $phongban = PhongBan::find($id);
        if(empty($phongban)){
            return view('errors.401');
        }
        else{
            $phongban->Tenphongban = $request->name;
            $phongban->Tenchinhanh = $request->get('newBranch',"");
            $checkActiveOrClose = $request->get('group1');
            if( $checkActiveOrClose == 'active' ){
                $phongban->Tinhtrang = "Hoạt động";
            }
            else if($checkActiveOrClose == 'close'){
                $phongban->Tinhtrang = "Tạm ngừng";
            }
            
            if($phongban->save()){
                
                

                return redirect('phongban')->with('success',__('Bạn đã sửa phòng ban thành công'));
            }
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
    public function delete($id)
    {
        $phongban = PhongBan::find($id);
        if(!empty($phongban)){
            if($phongban->delete()){
                return redirect('phongban')->with('success',__('Đã xóa thành công phòng ban'));
            }
        }
        else{
            return view('errors.401');
        }
        
        
    }
    public function export() 
    {
        return Excel::download(new PhongbanExport, 'phongban.xlsx');
    }
    public function import() 
    {
        if (!empty(request()->file('file'))){
            Excel::import(new PhongBanImport,request()->file('file'));
            return redirect('phongban')->with('success',__('Thành công'));
        }
        else{
            return redirect('phongban')->with('success',__('Vui lòng chọn tệp'));
        }
    }
}
