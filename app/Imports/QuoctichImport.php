<?php

namespace App\Imports;

use App\Models\QuanLyQuocTich;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuoctichImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        $quoctich = new QuanLyQuocTich();

        $quoctich->Ten_quoctich = @$row['ten_quoc_tich'];
        $quoctich->Ghichu = @$row['ghi_chu'];
        $quoctich->Trangthai = @$row['trang_thai'];
        return $quoctich;
;
    }
}
