<?php

namespace App\Exports;

use App\Models\KhoaDaoTao;
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
class KhoadaotaoExport implements FromView
{
    public function view(): View
    {
        $danhsach = KhoaDaoTao::all();
        return view('Settings.Daotao.ExportQLKhoaDaoTao',compact('danhsach'));
    }
}
