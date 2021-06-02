<?php

namespace App\Exports;

use App\Models\HoSo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HosoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        $danhsach = HoSo::all();
        
        return view('Settings.Hoso.ExportQLHoSo',compact('danhsach'));
    }
}
