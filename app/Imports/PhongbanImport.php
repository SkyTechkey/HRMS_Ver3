<?php

namespace App\Imports;

use App\Models\PhongBan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhongbanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $phongBan = new PhongBan();
        
        $phongBan->Ten_phongban = @$row['ten_phong_ban'];
        $phongBan->Ghichu = @$row['ghi_chu'];
        $phongBan->Chinhanh = @$row['chi_nhanh'];
        $phongBan->Trangthai = @$row['trang_thai'];
        return $phongBan;
;
    }
}
