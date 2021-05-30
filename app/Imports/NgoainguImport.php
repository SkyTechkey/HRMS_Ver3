<?php

namespace App\Imports;

use App\Models\QuanLyNgoaiNgu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NgoainguImport implements ToModel, WithHeadingRow
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
        $ngoaingu = new QuanLyNgoaiNgu();

        $ngoaingu->Ten_ngoaingu = @$row['ten_ngoai_ngu'];
        $ngoaingu->Ghichu = @$row['ghi_chu'];
        $ngoaingu->Trangthai = @$row['trang_thai'];
        return $ngoaingu;
;
    }
}
