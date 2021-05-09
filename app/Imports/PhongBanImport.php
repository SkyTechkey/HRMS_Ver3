<?php

namespace App\Imports;

use App\PhongBan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhongBanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $phongban = new PhongBan();
        
        $phongban->Tenphongban = @$row['ten_phong_ban'];
        $phongban->Tinhtrang = @$row['tinh_trang'];
        $phongban->Tenchinhanh = @$row['ten_chi_nhanh'];
        return $phongban;
;
    }
}
