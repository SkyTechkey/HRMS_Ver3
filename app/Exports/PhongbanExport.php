<?php

namespace App\Exports;

use App\Models\QuanLyPhongBan;
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
class PhongbanExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyPhongBan::all();
        return view('Settings.Danhmuc.ExportQLPhongBan',compact('danhsach'));
    }
}
