<?php

namespace App\Exports;

use App\Models\QuanLyDanToc;
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
class DantocExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyDanToc::all();
        return view('Settings.Danhmuc.ExportQLDanToc',compact('danhsach'));
    }
}
