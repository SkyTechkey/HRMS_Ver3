<?php

namespace App\Imports;

use App\TrinhDoTinHoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class TrinhDoTinHocImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TrinhDoTinHoc([
            
                'Ten_Trinhdotinhoc'     => $row['tentdth'],
                'status'    => $row['status'],
                
            
        ]);
    }
}
