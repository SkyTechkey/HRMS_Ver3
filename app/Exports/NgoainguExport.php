<?php

namespace App\Exports;

use App\Models\QuanLyNgoaingu;
use Maatwebsite\Excel\Concerns\FromCollection;

class NgoainguExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QuanLyNgoaiNgu::all();
        
    }
}
