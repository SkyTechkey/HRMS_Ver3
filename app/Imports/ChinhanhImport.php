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

        $chinhanh->Ten_chinhanh = @$row['tenchinhanh'];
        $chinhanh->Ten_nguoidungdau = @$row['tennguoidungdau'];
        $chinhanh->Chucvu = @$row['chucvu'];
        $chinhanh->Diachi = @$row['diachi'];
        $chinhanh->Sodienthoai = @$row['sodienthoai'];
        $chinhanh->Email = @$row['email'];
        $chinhanh->Trangthai = @$row['trangthai'];
        $chinhanh->Ghichu = @$row['ghichu'];

        return $chinhanh;
    }
}
