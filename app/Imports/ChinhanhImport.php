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

        $chinhanh->Tenchinhanh = @$row['Tenchinhanh'];
        $chinhanh->Tennguoidungdau = @$row['Tennguoidungdau'];
        $chinhanh->Chucvu = @$row['Chucvu'];
        $chinhanh->Diachi = @$row['Diachi'];
        $chinhanh->Sodienthoai = @$row['Sodienthoai'];
        $chinhanh->Email = @$row['Email'];
        $chinhanh->Trangthai = @$row['Trangthai'];
        $chinhanh->Ghichu = @$row['Ghichu'];

        return $chinhanh;
    }
}
