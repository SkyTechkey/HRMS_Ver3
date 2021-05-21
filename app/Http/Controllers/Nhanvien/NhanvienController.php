<?php

namespace App\Http\Controllers\Nhanvien;

use App\Http\Controllers\Controller;
use App\Models\Nganhang;
use App\User;
use App\Models\Noilamviec;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Imports\UserImport;

class NhanvienController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien = User::all();
        $noilamviec = Noilamviec::all();
//        $array = array([
//           $nhanvien,
//           $noilamviec
//        ]);
        $join = DB::table('users')
            ->join('tbl_noilamviec', 'users.ID_Noilamviec', '=', 'tbl_noilamviec.id')->get();
        dd($join);
        return view('admin.Nhanvien.danhsach', compact('nhanvien', 'noilamviec', 'join'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        $nhanvien->Hovaten = $request->hovaten;
        $nhanvien->Tenthuonggoi = $request->tenthuonggoi;
        $nhanvien->Gioitinh = $request->gioitinh;
        $nhanvien->Ngayvaolam = $request->ngayvaolam;
        $nhanvien->Sodienthoai = $request->sodienthoai;
        $nhanvien->Email = $request->email;
        $nhanvien->Socmnd = $request->socmnd;
        $nhanvien->ngaycapCMND = $request->ngaycapcmnd;
        $nhanvien->NoicapCMND = $request->noicapcmnd;
        $nhanvien->Ngaysinh = $request->ngaysinh;
        $nhanvien->Noisinh = $request->noisinh;
        $nhanvien->ID_Phongban = $request->phongban;
        $nhanvien->ID_Chucvu = $request->chucvu;
        $nhanvien->ID_Noilamviec = $request->noilamviec;
        $nhanvien->Diachithuongtru = $request->diachithuongtru;
        $nhanvien->Diachitamtru = $request->diachitamtru;
        $nhanvien->Masothue = $request->masothue;
        $nhanvien->Sotaikhoan = $request->sotaikhoan;
        $nhanvien->ID_Nganhang = $request->nganhang;
        $nhanvien->Ngayvaocongdoan = $request->ngayvaocongdoan;
        $nhanvien->Ngayvaodoan = $request->ngayvaocongdoan;
        $nhanvien->Ngayvaodang = $request->ngayvaodang;
        $nhanvien->ID_Quoctich = $request->quoctich;
        $nhanvien->ID_Tongiao = $request->tongiao;
        $nhanvien->ID_Dantoc = $request->dantoc;
        $nhanvien->ID_Nguoigioithieu = $request->nguoigioithieu;
        $nhanvien->Tinhtranghonnhan = $request->tinhtranghonnhan;
        $nhanvien->ID_HinhthucNV = $request->hinhthucnhanvien;
        $nhanvien->Hinhanh = $request->hinhanh;
        $nhanvien->Ghichu = $request->ghichu;

        //trang thai
        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $nhanvien->Trangthai = "Đang làm việc";
        }
        else if($checkActiveOrClose == 'close'){
            $nhanvien->Trangthai = "Tạm ngừng việc";
        }
        $nhanvien->username = $request->tendangnhap;
        $nhanvien->password = $request->matkhau;
        $nhanvien->tongiao = $request->tongiao;
        $nhanvien->quoctich = $request->quoctich;
        $nhanvien->ngoaingu = $request->ngoaingu;

//        dd($nhanvien);
        $nhanvien->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $nhanvien = User::find($id);
//        $noilamviec = Noilamviec::all();
//        return view('admin.Nhanvien.suanhanvien', compact('nhanvien', 'noilamviec'));

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
     * @param \Illuminate\Http\Request $request
     * @param $idd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nhanvien = User::find($id);
        $nhanvien->username = $request->username;
        $nhanvien->Hovaten = $request->hovaten;
        $nhanvien->Ngaysinh = $request->ngaysinh;
        $nhanvien->Ngayvaolam = $request->ngayvaolam;
        $nhanvien->ID_Noilamviec = $request->id_noilamviec;
        $nhanvien->Trangthai = $request->trangthai;

        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $nhanvien->Trangthai = "Đang làm việc";
        }
        else if($checkActiveOrClose == 'close'){
            $nhanvien->Trangthai = "Tạm ngừng việc";
        }
        dd($nhanvien);
//        $nhanvien->save();
//
//        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = User::find($id)->delete();
        return back();
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
