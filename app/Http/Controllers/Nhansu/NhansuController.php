<?php

namespace App\Http\Controllers\Nhansu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\QuanLyDanToc;
use App\Models\QuanLyQuocTich;
use App\Models\QuanLyTinhThanhPho;
use App\Models\QuanLyQuanHuyen;
use App\Models\QuanLyXaPhuong;
use App\Models\QuanLyPhongBan;
use App\Models\QuanLyChiNHanh;
use App\Models\ChucVu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use App\Imports\NhansuImport;

class NhansuController extends Controller implements WithHeadings, FromCollection
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhansu = User::all();
        return view('Nhansu.index', compact('nhansu'));
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
        $nhansu = new User();
        // $nhansu->Hinhanh = $request->hinhanh;
        $nhansu->Hovaten = $request->hovaten;
        $nhansu->Username = $request->username;
        $nhansu->password = bcrypt($request->matkhau);
        $nhansu->Email = $request->email;
        $nhansu->Ngayvaolam = $request->ngayvaolam;
        $nhansu->Sodienthoai = $request->sodienthoai;
        $nhansu->Ghichu = $request->ghichu;
        $nhansu->Trangthai = $request->status;
        $fileImage = $request->hinhanh;
        if(!empty($fileImage)){
            $nhansu->Hinhanh = $fileImage->getClientOriginalName();
        }
        if($nhansu->save()){
            if(!empty($fileImage)){
                $fileImage->move('project_asset/images/image_users',$fileImage->getClientOriginalName());
            }
            return back()->with('success', 'Tạo mới dữ liệu thành công!');
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
        $dantoc = QuanLyDanToc::all();
        $item = User::find($id);
        $nhansu = User::all();
        $quoctich = QuanLyQuocTich::all();
        $phongban = QuanLyPhongBan::all();
        $chinhanh = QuanLyChiNhanh::all();
        $chucvu = ChucVu::all();
        $tinhthanhpho = QuanLyTinhThanhPho::all();
        $quanhuyen = QuanLyQuanHuyen::all();
        $xaphuong = QuanLyXaPhuong::all();
        return view('Nhansu.Chitietnhansu',compact('nhansu','item','dantoc','quoctich','tinhthanhpho','quanhuyen','xaphuong','phongban','chinhanh','chucvu'));
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
        
        

        $nhansu = User::find($id);
        
        $nhansu->Hovaten = $request->hovaten;
        $nhansu->Noisinh = $request->noisinh;
        $nhansu->ID_Dantoc = $request->input('dantoc');
        $nhansu->ID_Quoctich = $request->input('quoctich');
        $nhansu->Socmnd = $request->soCMND;
        $nhansu->NoicapCMND = $request->noicapCMND;
        $nhansu->Ngayvaocongdoan = $request->ngaythamgiaCĐ;
        $nhansu->ID_Tinhthuongtru = $request->input('tinhthuongtru');
        $nhansu->ID_Xathuongtru = $request->input('xathuongtru');
        $nhansu->ID_Tinhtamtru = $request->input('tinhtamtru');
        $nhansu->ID_Xatamtru = $request->input('xatamtru');
        $nhansu->Noisinh = $request->noisinh;
        $nhansu->ID_Tongiao = $request->input('tongiao');
        $nhansu->ID_Hocvan = $request->input('hocvan');
        $nhansu->ngaycapCMND = $request->ngaycapCMND;
        $nhansu->Masothue = $request->masothue;
        $nhansu->Ngayvaodoan = $request->ngayvaodoan;
        $nhansu->ID_Quanthuongtru = $request->input('quanthuongtru');
        $nhansu->ID_Quantamtru = $request->input('quantamtru');
        $nhansu->Diachitamtru = $request->diachitamtru;
        $nhansu->Diachithuongtru = $request->diachithuongtru;
        $nhansu->Tinhtranghonnhan = $request->tinhtranghonnhan;
        $nhansu->ID_Noilamviec = $request->input('noilamviec');
        $nhansu->ID_Chinhanh = $request->input('chinhanh');
        $nhansu->ID_Phongban = $request->input('phongban');
        $nhansu->ID_Chucvu = $request->input('chucvu');
        $nhansu->Sodienthoai = $request->sodienthoai;
        $nhansu->Sodienthoai = $request->sodienthoaiban;
        $nhansu->Email = $request->email;
        $nhansu->Ngaysinh = $request->ngaysinh;
        $nhansu->Gioitinh = $request->gioitinh;
        $nhansu->Ngayvaolam = $request->ngayvaolam;
        $nhansu->Ngayvaocongdoan = $request->ngaythamgiaCĐ;
        

        
        $fileImage = $request->hinhanh;
        if(!empty($fileImage)){
            $nhansu->Hinhanh = $fileImage->getClientOriginalName();
        }
        if($nhansu->save()){
            if(!empty($fileImage)){
                $fileImage->move('project_asset/images/image_users',$fileImage->getClientOriginalName());
            }
            return back()->with('success', 'Chỉnh sửa dữ liệu thành công!');
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
        $id = User::find($id)->delete();
        return back();
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        return (collect(User::get([
            'ID', 'Hinhanh', 'Hovaten', 'username', 'Ngayvaolam', 'Sodienthoai', 'Email',
            'Ghichu', 'Trangthai'
        ])));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Ma_NV',
            'Hinh_anh',
            'Ho_va_ten',
            'Username',
            'Ngay_vao_lam',
            'So_dien_thoai',
            'Email',
            'Ghi_chu',
            'Trang_thai'
        ];
    }

    public function export() {
        return Excel::download(new NhansuController(), 'nhansu.xlsx');
    }

    public function import() {
        Excel::import(new NhansuImport(), request()->file('file'));
        return back();
    }
}
