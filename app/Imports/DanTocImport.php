<?php

namespace App\Imports;

use App\DanToc;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DanTocImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DanToc([
            'Tendantoc_Dantoc'     => $row['tendt'],
            'status'    => $row['status'],
            
        ]);
        
        
    }
    
}
