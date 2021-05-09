<?php

namespace App\Exports;

use App\PhongBan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhongBanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PhongBan::all();
    }
}
