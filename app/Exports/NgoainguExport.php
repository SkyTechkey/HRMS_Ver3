<?php

namespace App\Exports;

use App\Models\QuanLyNgoaingu;
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
class NgoainguExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyNgoaiNgu::all();
        return view('Settings.Danhmuc.ExportQLNgoaiNgu',compact('danhsach'));
    }
}
