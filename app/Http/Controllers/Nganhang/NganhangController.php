<?php

namespace App\Http\Controllers\Nganhang;

use App\Http\Controllers\Controller;
use App\Imports\NganhangImport;
use App\Models\Nganhang;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class NganhangController extends Controller implements WithHeadings, FromCollection
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nganhang = Nganhang::all();
        return view('admin.Nganhang.danhsach', compact('nganhang'));
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
        $nganhang = new Nganhang();
        $nganhang->Tennganhang = $request->tennganhang;
        $nganhang->Diachi = $request->diachi;
        $nganhang->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Nganhang $nganhang)
    {

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
        $nganhang = Nganhang::find($id);

        $nganhang->Tennganhang = $request->tennganhang;
        $nganhang->Diachi = $request->diachi;
        $nganhang->save();

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
        $id = Nganhang::find($id)->delete();
        return back();
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        return (collect(Nganhang::all()));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Tên ngân hàng',
            'Chi nhánh',
            'Ngày tạo',
            'Ngày sửa'
        ];
    }

    public function export() {
        return Excel::download(new NganhangController(), 'nganhang.xlsx');
    }

    public function import() {
        Excel::import(new NganhangImport(), request()->file('file'));
        return back();
    }
}
