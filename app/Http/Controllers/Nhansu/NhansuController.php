<?php

namespace App\Http\Controllers\Nhansu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\{GiamTruGiaCanh, LoaiQuanHe};
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
        $giacanh = GiamTruGiaCanh::all();
        $quanhe = LoaiQuanHe::all();
        return view('Nhansu.index', compact('nhansu', 'giacanh', 'quanhe'));
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
        //
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
        $nhansu->Username = $request->username;
        // $nhansu->password = bcrypt($request->matkhau);
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
