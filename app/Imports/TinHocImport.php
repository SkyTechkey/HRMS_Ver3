<?php

namespace App\Imports;

use App\Models\TinHoc;
use Maatwebsite\Excel\Concerns\ToModel;

class TinHocImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TinHoc([
            'word' => $row[0],
            'excel' => $row[1],
            'power_point' => $row[2]
        ]);
    }
}
