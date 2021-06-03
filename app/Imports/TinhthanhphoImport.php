<?php

namespace App\Imports;

use App\Models\QuanLyTinhThanhPho;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TinhthanhphoImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $tinhthanhpho = new QuanLyTinhThanhPho();

        $tinhthanhpho->Ten_tinhthanhpho = @$row['tentinhthanhpho'];
        $tinhthanhpho->Trangthai = @$row['trangthai'];
        $tinhthanhpho->Ghichu = @$row['ghichu'];

        return $tinhthanhpho;
    }
}
