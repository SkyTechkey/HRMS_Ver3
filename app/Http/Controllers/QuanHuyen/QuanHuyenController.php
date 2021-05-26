<?php

namespace App\Http\Controllers\QuanHuyen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\TinhThanh;
use App\Models\QuanHuyen;
use App\Models\XaPhuong;
use App\Models\DiachiModel;

class QuanHuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinhthanh = TinhThanh::all();
        $quanhuyen = QuanHuyen::all();
        $xaphuong = XaPhuong::all();

        return view('admin.Nhanvien.tinhthanh', compact('tinhthanh', 'quanhuyen', 'xaphuong'));
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
        //
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
        //
    }

    public function getTinhThanh()
    {
        $tinhthanh = Tinhthanh::all();
        return view('admin.Nhanvien.themnhanvien', compact('tinhthanh'));
    }

    public function getQuanHuyen(Request $request, $id)
    {
        $quanhuyen = Quanhuyen::where("id_tinhthanh", $id)->pluck("tenquanhuyen", "id");
        // dd($quanhuyen);
        return response()->json($quanhuyen);
    }

    public function getXaPhuong($id)
    {
        $xaphuong = XaPhuong::all()->where("id_quanhuyen", $id)->pluck("tenxaphuong", "id");
        return response()->json($xaphuong);
    }

    // public function postDiachi(Request $request) {
    //     $postDiachi = new DiachiModel();
    //     $postDiachi->id_tinhthanh = $request->tinhthanh;
    //     $postDiachi->id_quanhuyen = $request->quanhuyen;
    //     $postDiachi->id_xaphuong = $request->xaphuong;
    //     $postDiachi->save();

    //     return back();
    // }
}
