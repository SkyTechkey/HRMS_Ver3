<?php

namespace App\Imports;

use App\Tongiao;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TongiaoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tongiao = new Tongiao();
        $tongiao->id = @$row['id'];
        $tongiao->TenTG_Tongiao = @$row['tentg_tongiao'];
        return $tongiao;
;
    }
}
