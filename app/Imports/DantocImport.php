<?php

namespace App\Imports;

use App\Models\QuanLyDanToc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DantocImport implements ToModel, WithHeadingRow
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
        $dantoc = new QuanLyDanToc();

        $dantoc->Ten_dantoc = @$row['ten_dan_toc'];
        $dantoc->Ghichu = @$row['ghi_chu'];
        $dantoc->Trangthai = @$row['trang_thai'];
        return $dantoc;
;
    }
}
