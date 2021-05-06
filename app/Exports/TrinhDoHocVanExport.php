<?php

namespace App\Exports;

use App\TrinhDoHocVan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrinhDoHocVanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrinhDoHocVan::all();
    }
}
