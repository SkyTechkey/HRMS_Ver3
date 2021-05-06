<?php

namespace App\Imports;

use App\Quoctich;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuoctichImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $quoctich = new Quoctich();
        $quoctich->id = @$row['id'];
        $quoctich->TenQT_Quoctich = @$row['tenqt_quoctich'];
        return $quoctich;
;
    }
}
