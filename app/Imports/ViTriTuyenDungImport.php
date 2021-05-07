<?php

namespace App\Imports;

use App\Models\ViTriTuyenDung;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ViTriTuyenDungImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new ViTriTuyenDung([
            'Tenvitrituyendung_Vitrituyendung'     => $row['vi_tri_tuyen_dung'],
            'Tenviettat'    =>$row['ten_viet_tat'],
            'status'    => $row['trang_thai'],
            
            
        ]);
        
    }
}
