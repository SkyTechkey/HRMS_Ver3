<?php

namespace App\Exports;

use App\TrinhDoTinHoc;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrinhDoTinHocExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrinhDoTinHoc::all();
    }
}
