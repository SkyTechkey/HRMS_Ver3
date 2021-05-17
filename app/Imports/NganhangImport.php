<?php

namespace App\Imports;

use App\Nganhang;
use Maatwebsite\Excel\Concerns\ToModel;

class NganhangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nganhang([
                'Tennganhang' => $row[0],
                'Diachi' => $row[1]
        ]);
    }
}
