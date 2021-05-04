<?php

namespace App\Http\Controllers\Dantoc;

use App\Dantoc;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DantocController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dantoc = Dantoc::all();
        return view('Admin.Dantoc.danhsach', compact('dantoc'));
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
        $dantoc = new Dantoc();
        $dantoc->ten = $request->ten;
        $dantoc->save();
        return redirect('danhsachdantoc');
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
        $dantoc = Dantoc::find($id);
        $dantoc->ten = $request->ten;
        $dantoc->save();
        return redirect('danhsachdantoc');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Dantoc::find($id)->delete();
        return redirect('danhsachdantoc');
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        $dantoc = Dantoc::all();
//        foreach($dantoc as $row){
//            $dantoc[] = array(
//                '0' => $row->id,
//                '1' => $row->ten,
//            );
//        }
        return (collect($dantoc));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Tên',
            'Tạo',
            'Cập nhập',
        ];
    }

    public function export(){
        return Excel::download(new DantocController(), 'orders.xlsx');
    }

    public function import(){
        Excel::import(new UsersImport(), request()->file('file'));
        return back();
    }
}
