<?php

namespace App\Imports;

use App\Models\LoaiHoSo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LoaihosoImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $loaihoso = new LoaiHoSo();

        $loaihoso->Ten_loaihoso = @$row['tenloaihoso'];
        $loaihoso->Trangthai = @$row['trangthai'];
        $loaihoso->Ghichu = @$row['ghichu'];

        return $loaihoso;
    }
}
