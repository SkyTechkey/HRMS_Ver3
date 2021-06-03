<?php

namespace App\Exports;

use App\Models\PhuCap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PhucapExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        $danhsach = PhuCap::all();
        
        return view('Settings.Luong.ExportQLLoaiPhuCap',compact('danhsach'));
    }
}
