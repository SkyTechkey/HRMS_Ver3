<?php

namespace App\Exports;

use App\Models\ChucVu;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChucvuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ChucVu::all();
    }
}
