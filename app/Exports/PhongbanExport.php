<?php

namespace App\Exports;

use App\Models\PhongBan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhongbanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PhongBan::all();
    }
}
