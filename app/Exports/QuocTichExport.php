<?php

namespace App\Exports;

use App\Models\QuanLyQuocTich;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QuocTichExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyQuocTich::all();
        return view('Settings.Danhmuc.ExportQLQuocTich',compact('danhsach'));
    }
}
