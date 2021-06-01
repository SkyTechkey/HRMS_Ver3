<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class NhansuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        

            $nhansu = new User();

            $nhansu->id = @$row['id'];
            $nhansu->Hinhanh = @$row['Hinhanh'];
            $nhansu->Hovaten = @$row['Hovaten'];
            $nhansu->username = @$row['username'];
            $nhansu->Ngayvaolam = @$row['Ngayvaolam'];
            $nhansu->Sodienthoai = @$row['Sodienthoai'];
            $nhansu->Email = @$row['Email'];
            $nhansu->Ghichu = @$row['Ghichu'];
            $nhansu->Trangthai = @$row['Trangthai'];
        
    }
}
