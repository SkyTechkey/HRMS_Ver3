<?php

namespace App\Imports;

use App\Ngoaingu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NgoainguImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $ngoaingu = new Ngoaingu();
        $ngoaingu->id = @$row['id'];
        $ngoaingu->TenNN_Ngoaingu = @$row['tennn_ngoaingu'];
        return $ngoaingu;
;
    }
}
