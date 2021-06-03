<?php

namespace App\Imports;

use App\Models\TuyenDung;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TuyendungImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tuyendung = new TuyenDung();
        
        $tuyendung->Ten_vitrituyendung = @$row['ten_vi_tri'];
        $tuyendung->Ghichu = @$row['ghi_chu'];
        $tuyendung->Trangthai = @$row['trang_thai'];
        return $tuyendung;
;
    }
}
