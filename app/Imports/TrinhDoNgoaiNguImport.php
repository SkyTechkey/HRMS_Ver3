<?php

namespace App\Imports;

use App\Models\TrinhDoNgoaiNgu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrinhDoNgoaiNguImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new TrinhDoNgoaiNgu([
            
            'Tentrinhdongoaingu_Trinhdongoaingu'     => $row['trinh_do_ngoai_ngu'],
            
            'status'    => $row['trang_thai'],
        ]);
    }
}
