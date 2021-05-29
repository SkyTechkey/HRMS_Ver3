<?php

namespace App\Imports;

use App\Models\ChucVu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChucvuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chucVu = new ChucVu();
        
        $chucVu->Ten_chucvu = @$row['ten_chuc_vu'];
        $chucVu->Ghichu = @$row['ghi_chu'];
        $chucVu->Trangthai = @$row['trang_thai'];
        return $chucVu;
;
    }
}
