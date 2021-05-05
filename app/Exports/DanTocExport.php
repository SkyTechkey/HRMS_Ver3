<?php

namespace App\Exports;

use App\DanToc;
use Maatwebsite\Excel\Concerns\FromCollection;

class DanTocExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DanToc::all();
    }
}
