<?php

namespace App\Imports;

use App\Models\ChucVu;
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
            'Tenchucvu_Chucvu'     => $row['ten_chuc_vu'],
            'HesoCV'    => $row['he_so_cong_viec'],
            'status'    => $row['trang_thai'],
        ]);
    }
}
