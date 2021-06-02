<?php

namespace App\Imports;

use App\Models\QuanLyXaPhuong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class XaphuongImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $xaphuong = new QuanLyXaPhuong();

        $xaphuong->Ten_xaphuong = @$row['tenxaphuong'];
        $xaphuong->ID_quanhuyen = @$row['maquanhuyen'];
        $xaphuong->Trangthai = @$row['trangthai'];
        $xaphuong->Ghichu = @$row['ghichu'];

        return $xaphuong;
    }
}
