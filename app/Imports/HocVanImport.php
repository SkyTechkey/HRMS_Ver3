<?php

namespace App\Imports;

use App\Models\HocVan;
use Maatwebsite\Excel\Concerns\ToModel;

class HocVanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HocVan([
            'pho_thong' => $row[0],
            'cao_dang' => $row[1],
            'dai_hoc' => $row[2],
            'cao_hoc' => $row[3],
        ]);
    }
}
