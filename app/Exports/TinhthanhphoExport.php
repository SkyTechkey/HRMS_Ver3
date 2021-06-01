<?php

namespace App\Exports;

use App\Models\QuanLyTinhThanhPho;
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
class TinhthanhphoExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyTinhThanhPho::all();
        return view('Settings.Danhmuc.ExportQLTinhThanhPho',compact('danhsach'));
    }
}
