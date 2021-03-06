<?php

namespace App\Exports;

use App\Models\QuanLyChiNhanh;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

//class NgoainguExport implements FromCollection
//{
    /**
    * @return \Illuminate\Support\Collection
    */
 //   public function collection()
 ////   {
     //   return QuanLyNgoaiNgu::all();

 //   }

//}
class ChinhanhExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyChiNhanh::all();
        return view('Settings.Danhmuc.ExportQLChiNhanh',compact('danhsach'));
    }
}
