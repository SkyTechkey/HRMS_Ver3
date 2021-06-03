<?php

namespace App\Imports;

use App\Models\QuanLyPhongBan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhongbanImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $phongban = new QuanLyPhongBan();

        $phongban->Ten_phongban = @$row['ten_phong_ban'];
        $phongban->Chinhanh = @$row['chi_nhanh'];
        $phongban->Trangthai = @$row['trang_thai'];
        $phongban->Ghichu = @$row['ghi_chu'];

        return $phongban;
    }
}
