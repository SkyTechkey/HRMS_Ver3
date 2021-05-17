<?php

namespace App\Exports;

use App\Models\Nganhang;
use Maatwebsite\Excel\Concerns\FromCollection;

class NganhangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nganhang::all();
    }
}
