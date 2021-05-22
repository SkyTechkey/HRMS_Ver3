<?php

namespace App\Http\Controllers\Nhanvien;

use App\Http\Controllers\Controller;
use App\Models\Nganhang;
use App\User;
use App\Models\Noilamviec;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Imports\UserImport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class NhanvienController extends Controller implements FromCollection, WithHeadings
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
        $nhanvien = User::all();
        $noilamviec = Noilamviec::all();
        $nganhang = Nganhang::all();
        return view('admin.Nhanvien.danhsach', compact('nhanvien', 'noilamviec', 'nganhang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Id_new = DB::table('users')->max('id');
        $tbl_Noilamviec = Noilamviec::all();
        return view('admin.Nhanvien.themnhanvien',compact('Id_new','tbl_Noilamviec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new User();

        $nhanvien->Hovaten = $request->fullname;
        $nhanvien->username = $request->username;
        $nhanvien->password = bcrypt($request->password);
        $nhanvien->Ngaysinh =$request->ngaySinh;
        $nhanvien->Ngayvaolam = $request->ngayVaoLam;
        $nhanvien->ID_Noilamviec = $request->input('noiLamViec');
        $nhanvien->TrangThai = $request->input('status');
        
        $fileImage = $request->avatar;
        if(!empty($fileImage)){
            $nhanvien->Hinhanh = $fileImage->getClientOriginalName();
            
        }
        else{
            return redirect('nhanvien')->with('success', 'Vui lòng chọn ảnh đại diện!');
        }
        if($nhanvien->save()){
            if(!empty($fileImage)){
                $fileImage->move('project_asset/images/images_user',$fileImage->getClientOriginalName());
            }
            return redirect('nhanvien')->with('success', 'Tạo mới thành công thành công nhân viên!');
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
    public function getUpdate($id)
    {
        $edit_user = User::find($id);
        $tbl_Noilamviec = NoilamViec::all();
        
        return view('admin.Nhanvien.suanhanvien',compact('edit_user','tbl_Noilamviec'));
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
     
        $nhanvien = User::find($id);
        $nhanvien->Hovaten = $request->fullname;
        $nhanvien->username = $request->username;
        $nhanvien->password = bcrypt($request->password);
        $nhanvien->Ngaysinh =Carbon::parse($request->ngaySinh);
        $nhanvien->Ngayvaolam = Carbon::parse($request->ngayVaoLam);
        $nhanvien->ID_Noilamviec = $request->input('noiLamViec');
        $nhanvien->TrangThai = $request->input('status');
        
        $fileImage = $request->avatar;
        if(!empty($fileImage)){
            $nhanvien->Hinhanh = $fileImage->getClientOriginalName();
            
        }
        
        if($nhanvien->save()){
            if(!empty($fileImage)){
                $fileImage->move('project_asset/images/images_user',$fileImage->getClientOriginalName());
            }
            return redirect('nhanvien')->with('success', 'Sửa thành công thông tin nhân viên!');
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
        $user = User::find($id);
        if(!empty($id)){
            $user->delete();
            return redirect()->back()->with('success', 'Xóa thành công thông tin nhân viên!');
        }
        
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        return collect(User::all());
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Họ và tên',
            'Tên thường gọi',
            'Gới tính',
            'Ngày vào làm',
            'Số điện thoại',
            'Email',
            'Số CMND',
            'Ngày cấp CMND',
            'Nơi cấp CMND',
            'Ngày sinh',
            'Nơi sinh',
            'Phòng ban',
            'Chức vụ',
            'Nơi làm việc',
            'Địa chỉ thường trú',
            'Địa chỉ tạm trú',
            'Mã số thuê',
            'Số tài khoản',
            'Ngân hàng',
            'Ngày vào công đoàn',
            'Ngày vào đoàn',
            'Ngày vào đảng',
            'Quốc tịch',
            'Tôn giáo',
            'Dân tộc',
            'Người giới thiệu',
            'Tình trạng hôn nhân',
            'Hình thức nhân viên',
            'Hình ảnh',
            'Ghi chú',
            'Trạng thái',
            'Tên đăng nhập'
        ];
    }

    public function export() {
        return Excel::download(new NhanvienController(), 'nhanvien.xlsx');

    }

    public function import() {
        return Excel::import(new UserImport, request()->file('file'));
        return back();
    }
}
