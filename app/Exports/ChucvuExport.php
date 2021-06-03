<?php

namespace App\Exports;

use App\Models\ChucVu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ChucvuExport implements FromView
{
    public function view(): View
    {
        $danhsach = ChucVu::all();
        return view('Settings.Danhmuc.ExportChucVu',compact('danhsach'));
    }
}
