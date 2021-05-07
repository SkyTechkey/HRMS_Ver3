<?php

namespace App\Http\Controllers\HocVan;

use App\Http\Controllers\Controller;
use App\Imports\TinHocImport;
use App\Models\TinHoc;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;
use function Sodium\compare;

class TinHocController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tin_hoc = TinHoc::all();
        return view('Admin.HocVan.TinHoc.tinhoc', compact('tin_hoc'));
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
        $tin_hoc = new TinHoc();

        $tin_hoc->word = $request->word;
        $tin_hoc->excel = $request->excel;
        $tin_hoc->power_point = $request->power_point;
        $tin_hoc->save();

        return back()->with('success', __('Thêm trình độ tin học thành công'));
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
        $tin_hoc = TinHoc::find($id);
        return redirect('tinhoc', compare('tin_hoc'));
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
        $tin_hoc = TinHoc::find($id);

        $tin_hoc->word = $request->word;
        $tin_hoc->excel = $request->excel;
        $tin_hoc->power_point = $request->power_point;
        $tin_hoc->save();

        return back()->with('success', __('Sửa thành công'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = TinHoc::find($id);
        if ($id)
        {
            if (count($id->tinhoc) > 0)
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
    }

    public function destroyAll(){
        $tin_hoc = TinHoc::all('id');
        if ($tin_hoc){
            return back()->with('success',__('Bạn không được quyền xóa tất cả bảng này'));
//            dd($ngoaingu);
        }
//            return redirect('ngoaingu')->with('success',__('Bạn đã xóa tất cả ngoai ngu mới thành công'));
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        $tin_hoc = TinHoc::all();
        return (collect($tin_hoc));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Word',
            'Excel',
            'Power Point'
        ];
    }

    public function export()
    {
        return Excel::download(new TinHocController(), 'tinhoc.xlsx');
    }

    public function import()
    {
        Excel::import(new TinHocImport(), request()->file('file'));
        return back();
    }
}
