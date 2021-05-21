<?php

namespace App\Http\Controllers\Noilamviec;

use App\Http\Controllers\Controller;
use App\Imports\NoilamviecImport;
use App\Models\Noilamviec;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class NoilamviecController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noilamviec = Noilamviec::all();
        return view('admin.Noilamviec.danhsach', compact('noilamviec'));
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
        $noilamviec->Tenchinhanh = $request->tenchinhanh;
        $noilamviec->Diachi = $request->diachi;
        $noilamviec->save();

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
        $noilamviec = Noilamviec::find($id);

        $noilamviec->Tenchinhanh = $request->tenchinhanh;
        $noilamviec->Diachi = $request->diachi;
        $noilamviec->save();

        return back();
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

    public function collection()
    {
        // TODO: Implement collection() method.
        return (collect(Noilamviec::all()));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Tên chi nhánh',
            'Địa chỉ',
            'Ngày tạo',
            'Ngày sửa'
        ];
    }

    public function export() {
        return Excel::download(new NoilamviecController(), 'noilamviec.xlsx');
    }

    public function import() {
        Excel::import(new NoilamviecImport(), request()->file('file'));
        return back();
    }
}
