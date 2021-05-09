<?php

namespace App\Imports;

use App\ChucVu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChucVuImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ChucVu([
            'Tenchucvu'     => $row['ten_chuc_vu'],
            'Luong'    => $row['luong'],
            'status'    => $row['trang_thai'],
        ]);
    }
}
