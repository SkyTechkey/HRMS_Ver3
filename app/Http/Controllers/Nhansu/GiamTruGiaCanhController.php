<?php

namespace App\Http\Controllers\Nhansu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GiamTruGiaCanh;

class GiamTruGiaCanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giacanh = GiamTruGiaCanh::all();
        $quanhe = LoaiQuanHe::all();
        return view('Nhansu.index', compact('giacanh', 'quanhe'));
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
        $giacanh = new GiamTruGiaCanh();
        $giacanh->Ten_nguoiquanhe = $request->tennguoiquanhe;
        $giacanh->ID_Loaiquanhe = $request->loaiquanhe;
        $giacanh->Ngaysinh = $request->ngaysinh;
        $giacanh->Diachihientai = $request->diachihientai;
        $giacanh->Nghenghiep = $request->nghenghiep;
        $giacanh->Sodienthoai = $request->sodienthoai;
        $giacanh->SoCMND = $request->socmnd;
        $giacanh->Ngaycap = $request->ngaycap;
        $giacanh->Noicap = $request->noicap;
        $giacanh->Ngaybatdaugiamtru = $request->ngaybatdaugiamtru;
        $giacanh->Ngayketthucgiamtru = $request->ngayketthucgiamtru;
        $giacanh->MaNPT = $request->masonpt;
        $giacanh->Ghichu = $request->ghichu;
        $giacanh->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $giacanh = GiamTruGiaCanh::find($id);
        $giacanh->Ten_nguoiquanhe = $request->tennguoiquanhe;
        $giacanh->ID_Loaiquanhe = $request->loaiquanhe;
        $giacanh->Ngaysinh = $request->ngaysinh;
        $giacanh->Diachihientai = $request->diachihientai;
        $giacanh->Nghenghiep = $request->nghenghiep;
        $giacanh->Sodienthoai = $request->sodienthoai;
        $giacanh->SoCMND = $request->socmnd;
        $giacanh->Ngaycap = $request->ngaycap;
        $giacanh->Noicap = $request->noicap;
        $giacanh->Ngaybatdaugiamtru = $request->ngaybatdaugiamtru;
        $giacanh->Ngayketthucgiamtru = $request->ngayketthucgiamtru;
        $giacanh->MaNPT = $request->masonpt;
        $giacanh->Ghichu = $request->ghichu;
        $giacanh->save();
        return back();
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
    public function destroy($id)
    {
        $id = GiamTruGiaCanh::find($id)->delete();
        return back();
    }
}
