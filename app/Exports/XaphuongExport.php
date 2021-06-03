<?php

namespace App\Exports;

use App\Models\QuanLyXaPhuong;
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
class XaphuongExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyXaPhuong::all();
        return view('Settings.Danhmuc.ExportQLXaPhuong',compact('danhsach'));
    }
}
