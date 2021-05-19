<?php

namespace App\Imports;

use App\Models\Noilamviec;
use Maatwebsite\Excel\Concerns\ToModel;

class NoilamviecImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Noilamviec([
            'Tenchinhanh' => $row[0],
            'Diachi' => $row[1]
        ]);
    }
}
