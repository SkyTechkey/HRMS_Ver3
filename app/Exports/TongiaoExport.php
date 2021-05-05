<?php

namespace App\Exports;

use App\Tongiao;
use Maatwebsite\Excel\Concerns\FromCollection;

class TongiaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tongiao::all();
    }
}
