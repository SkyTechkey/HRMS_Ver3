<?php

namespace App\Http\Controllers\HocVan;

use App\Models\HocVan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Imports\HocVanImport;

class TrinhDoHocVanController extends Controller implements FromCollection, WithHeadings
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoc_van = HocVan::all();
        return view('admin.HocVan.TrinhDoHocVan.trinhdohocvan', compact('hoc_van'));
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
        $hoc_van = new HocVan();

        $hoc_van->pho_thong = $request->pho_thong;
        $hoc_van->cao_dang = $request->cao_dang;
        $hoc_van->dai_hoc = $request->dai_hoc;
        $hoc_van->cao_hoc = $request->cao_hoc;
        $hoc_van->save();

        return back()->with('success', ('Thêm trình độ thành công'));
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
        $hoc_van = HocVan::find($id);
        return view('admin.HocVan.TrinhDoHocVan.trinhdohocvan', compact('hoc_van'));
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
        $hoc_van = HocVan::find($id);

        if ($id)
        {
            $hoc_van->pho_thong = $request->pho_thong;
            $hoc_van->cao_dang = $request->cao_dang;
            $hoc_van->dai_hoc = $request->dai_hoc;
            $hoc_van->cao_hoc = $request->cao_hoc;
            $hoc_van->save();

            return back()->with('success', ('Sửa trình độ thành công'));
        }else
        {
            return back();
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
        $id = HocVan::find($id);
        if ($id)
        {
            if (count($id->hocvan) > 0)
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

    public function collection()
    {
        // TODO: Implement collection() method.
        $hoc_van = HocVan::all();
        return (collect($hoc_van));
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Phổ Thông',
            'Cao Đẳng',
            'Đại Học',
            'Cao Học'
        ];
    }

    public function export()
    {
        return Excel::download(new TrinhDoHocVanController(), 'hocvan.xlsx');
    }

    public function import()
    {
        Excel::import(new HocVanImport(), request()->file('file'));
        return back();
    }
}
