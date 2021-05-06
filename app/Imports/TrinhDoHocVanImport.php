<?php

namespace App\Imports;

use App\TrinhDoHocVan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class TrinhDoHocVanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TrinhDoHocVan([
           
                'ten_trinhdohocvan'     => $row['tentdhv'],
                'status'    => $row['status'],
                
            
        ]);
    }
}
