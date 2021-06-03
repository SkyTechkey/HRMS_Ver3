<?php

namespace App\Imports;

use App\Models\QuanLyQuanHuyen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuanhuyenImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $quanhuyen = new QuanLyQuanHuyen();

        $quanhuyen->Ten_quanhuyen = @$row['tenquanhuyen'];
        $quanhuyen->ID_tinhthanhpho = @$row['matinhthanhpho'];
        $quanhuyen->Trangthai = @$row['trangthai'];
        $quanhuyen->Ghichu = @$row['ghichu'];

        return $quanhuyen;
    }
}
