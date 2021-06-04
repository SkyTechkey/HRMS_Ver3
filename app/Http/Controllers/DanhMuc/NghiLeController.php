<?php

namespace App\Http\Controllers\DanhMuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nghile;

class NghiLeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nghile = Nghile::all();
        return view('Settings.Danhmuc.nghile', \compact('nghile'));
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
        $nghile = new Nghile();
        $nghile->Ten_nghile = $request->tennghile;
        $nghile->Nam = $request->nam;
        $nghile->Ngaynghi = $request->ngaynghi;
        $nghile->Loai = $request->loai;
        $nghile->Heso = $request->heso;
        $nghile->Ghichu = $request->ghichu;
        if($nghile->save())
        {
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Lỗi không thể thêm dữ liệu!'));
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
    public function edit(Request $request, $id)
    {
        $nghile = Nghile::find($id);
        $nghile->Ten_nghile = $request->tennghile;
        $nghile->Nam = $request->nam;
        $nghile->Ngaynghi = $request->ngaynghi;
        $nghile->Loai = $request->loai;
        $nghile->Heso = $request->heso;
        $nghile->Ghichu = $request->ghichu;
        if($nghile->save())
        {
            return back()->with('success',__('Đã sửa dữ liệu thành công!'));
        }
        else
        {
            return back()->with('error',__('Lỗi không thể sửa dữ liệu!'));
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
    public function destroy($id)
    {
        $nghile = Nghile::find($id);
        if($nghile) {
            $nghile->delete();
            return back()->with('success',__('Đã xóa dữ liệu thành công!'));
        }else {
            return back()->with('success',__('Không thể xóa dữ liệu thành công!'));
        }
    }
}
