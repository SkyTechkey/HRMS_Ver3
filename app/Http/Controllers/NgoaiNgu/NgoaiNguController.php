<?php

namespace App\Http\Controllers\NgoaiNgu;

use App\Http\Controllers\Controller;
use App\Imports\ImportNgoaiNgu;
use App\Models\NgoaiNgu;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use function Sodium\compare;

class NgoaiNguController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ngoaingu = NgoaiNgu::all();
        return view('Admin.NgoaiNgu.danhsach', compact('ngoaingu'));
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
        $ngoaingu = new NgoaiNgu();
        $ngoaingu->ten_ngoai_ngu = $request->ten_ngoai_ngu;
        $ngoaingu->ten_tin_chi = $request->ten_tin_chi;
        $ngoaingu->save();
        return redirect('ngoaingu')->with('success', ('Thêm ngoại ngữ thành công'));
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
        $ngoaingu = NgoaiNgu::find($id);
        return redirect('ngoaingu', compare('ngoaingu'));
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
        $ngoaingu = NgoaiNgu::find($id);

        $ngoaingu->ten_ngoai_ngu = $request->ten_ngoai_ngu;
        $ngoaingu->ten_tin_chi = $request->ten_tin_chi;
        $ngoaingu->save();
        return back()->with('success', ('Sửa thành công'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\NgoaiNgu
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $id = NgoaiNgu::find($id);
        if ($id)
        {
            if (count($id->ngoaingu) > 0)
            {
                return back()->with('success',__('Bạn không được xóa trường này'));
            }elseif ($id->delete())
            {
                return back()->with('success',__('Bạn đã xóa trường này'));
            }
        }else
        {
            return back();
        }
//        if ($id)
//        {
//            if (count($id->ngoaingu) > 0)
//            {
//                return back()->with('success',__('Bạn không được xóa trường này'));
//            }else {
//                $id->delete();
//                return back()->with('success', __('Bạn đã xóa trường này'));
//            }
//        }else{
//            return back();
//        }

    }

//    public function destroyAll(){
//    $ngoaingu = NgoaiNgu::all('id');
//        if ($ngoaingu){
//            return redirect('ngoaingu')->with('success',__('Bạn không được quyền xóa tất cả bảng này'));
//        }
//    }

    public function collection()
    {
        // TODO: Implement collection() method.
        $ngoaingu = NgoaiNgu::all();
        return (collect($ngoaingu));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Tên ngoại ngữ',
            'Tên tín chỉ'
        ];
    }

    public function export()
    {
        return Excel::download(new NgoaiNguController(), 'ngoaingu.xlsx');
    }

    public function import()
    {
        Excel::import(new ImportNgoaiNgu, request()->file('file'));
        return back();
    }
}
