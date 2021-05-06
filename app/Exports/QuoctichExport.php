<?php

namespace App\Exports;

use App\Quoctich;
use Maatwebsite\Excel\Concerns\FromCollection;

class QuoctichExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Quoctich::all();
    }
}
