<?php

namespace App\Http\Controllers\Noilamviec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Noilamviec, DiaDanh};

class NoilamviecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noilamviec = Noilamviec::all();
        $diadanh = DiaDanh::all();
        return view('Settings.Noilamviec.noilamviec', \compact('noilamviec', 'diadanh'));
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
        $noilamviec = new Noilamviec();
        $noilamviec->Tenchinhanh = $request->tendiachi;
        $noilamviec->Id_Diachi = $request->id_diachi;
        if($noilamviec->save()){
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }else
            {
            return  back()->with('error',__('Lỗi không thể thêm dữ liệu!'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Noilamviec::find($id)->delete();
        return back();
    }
}
