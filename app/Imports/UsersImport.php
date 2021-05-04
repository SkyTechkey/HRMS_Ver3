<?php

namespace App\Imports;

use App\Import;
use App\Dantoc;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dantoc([
            'ten' => $row[1]
        ]);
    }
}
