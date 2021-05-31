<?php

namespace App\Imports;

use App\Models\QuanlyChinhanh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChinhanhImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        $chinhanh = new QuanlyChinhanh();

        $chinhanh->Tenchinhanh = @$row['Ten_chi_nhanh'];
        $chinhanh->Diachi = @$row['Dia_chi'];
        $chinhanh->Tennguoidungdau = @$row['Ten_nguoi_dung_dau'];
        $chinhanh->Email = @$row['Email'];
        $chinhanh->Sodienthoai = @$row['Sodienthoai'];
        $chinhanh->Chucvu = @$row['Chucvu'];
        $chinhanh->Trangthai = @$row['Trangthai'];
        $chinhanh->Ghichu = @$row['Ghichu'];

        return $chinhanh;
;
    }
}
