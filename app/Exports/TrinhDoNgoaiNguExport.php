<?php

namespace App\Exports;

use App\Models\TrinhDoNgoaiNgu;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrinhDoNgoaiNguExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrinhDoNgoaiNgu::all();
    }
}
