<?php

namespace App\Exports;

use App\Models\TuyenDung;
use Maatwebsite\Excel\Concerns\FromCollection;

class TuyendungExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TuyenDung::all();
    }
}
