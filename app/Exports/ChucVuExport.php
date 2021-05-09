<?php

namespace App\Exports;

use App\ChucVu;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChucVuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ChucVu::all();
    }
}
