<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{TinhThanh, QuanHuyen, XaPhuong, DiaDanh};


class TinhthanhphoController extends Controller
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
        $diadanh = DiaDanh::all();
        return view('Settings.Danhmuc.tinhthanh', \compact('tinhthanh', 'quanhuyen', 'xaphuong', 'diadanh'));
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
        $diadanh = new DiaDanh();
        $diadanh->id_tinhthanh = $request->tinhthanh;
        $diadanh->id_quanhuyen = $request->quanhuyen;
        $diadanh->id_xaphuong = $request->xaphuong;
        if($diadanh->save()){
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
        $diadanh = DiaDanh::find($id);
        $diadanh->id_tinhthanh = $request->tinhthanh;
        $diadanh->id_quanhuyen = $request->quanhuyen;
        $diadanh->id_xaphuong = $request->xaphuong;
        if($diadanh->save()){
            return back()->with('success',__('Đã thêm mới dữ liệu thành công!'));
        }else
            {
            return  back()->with('error',__('Lỗi không thể thêm dữ liệu!'));
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
        
        $tinhthanh = DiaDanh::find($id);
        if(count($tinhthanh->noilamviec) > 0){
            return back()->with('success',__('Lỗi không thể xóa dữ liệu!'));
        }else
            {
                $tinhthanh->delete();
                return  back()->with('error',__('Đã xóa dữ liệu thành công! '));
        }
    }

    public function getQuanHuyen($id)
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
}
