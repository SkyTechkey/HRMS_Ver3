<?php

namespace App\Exports;

use App\Ngoaingu;
use Maatwebsite\Excel\Concerns\FromCollection;

class NgoainguExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ngoaingu::all();
    }
}
