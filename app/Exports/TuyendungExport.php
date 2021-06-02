<?php

namespace App\Exports;

use App\Models\TuyenDung;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TuyendungExport implements FromView
{
    public function view(): View
    {
        $danhsach = TuyenDung::all();
        return view('Settings.Danhmuc.ExportTuyenDung',compact('danhsach'));
    }
}
