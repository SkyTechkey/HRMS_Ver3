<?php

namespace App\Exports;

use App\Models\QuanlyChinhanh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ChiNhanhExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanlyChinhanh::all();
        return view('Settings.Danhmuc.ExportQLChiNhanh',compact('danhsach'));
    }
}
