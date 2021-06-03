<?php

namespace App\Imports;

use App\Models\PhuCap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PhucapImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $phucap = new PhuCap();

        $phucap->Ten_phucap = @$row['loaiphucap'];
        $phucap->Sotien = @$row['sotien'];
        $phucap->Trangthai = @$row['trangthai'];
        $phucap->Ghichu = @$row['ghichu'];

        return $phucap;
    }
}
