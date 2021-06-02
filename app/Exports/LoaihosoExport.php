<?php

namespace App\Exports;

use App\Models\LoaiHoSo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LoaihosoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        $danhsach = LoaiHoSo::all();
        
        return view('Settings.Hoso.ExportQLLoaihoSo',compact('danhsach'));
    }
}
