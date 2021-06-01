<?php

namespace App\Exports;

use App\Models\QuanLyQuanHuyen;
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
class QuanhuyenExport implements FromView
{
    public function view(): View
    {
        $danhsach = QuanLyQuanHuyen::all();
        return view('Settings.Danhmuc.ExportQLQuanHuyen',compact('danhsach'));
    }
}
