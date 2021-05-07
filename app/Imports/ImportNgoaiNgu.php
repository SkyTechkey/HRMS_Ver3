<?php

namespace App\Imports;

use App\Models\NgoaiNgu;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNgoaiNgu implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NgoaiNgu([
            'ten_ngoai_ngu' => $row[0],
            'ten_tin_chi' => $row[1]
        ]);
    }
}
