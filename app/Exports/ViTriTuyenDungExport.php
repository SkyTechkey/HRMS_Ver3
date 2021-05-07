<?php

namespace App\Exports;

use App\Models\ViTriTuyenDung;
use Maatwebsite\Excel\Concerns\FromCollection;

class ViTriTuyenDungExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ViTriTuyenDung::all();
    }
}
