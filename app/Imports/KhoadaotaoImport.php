<?php

namespace App\Imports;

use App\Models\KhoaDaoTao;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KhoadaotaoImport implements ToModel, WithHeadingRow
{

public function headingRow() : int
        {
            return 1;
        }
    public function model(array $row)
    {
        
        $khoadaotao = new KhoaDaoTao();

        $khoadaotao->Ten_khoadaotao = @$row['tenkhoadaotao'];
        $khoadaotao->Kynang_khoadaotao = @$row['kynangkhoadaotao'];
        $khoadaotao->Quydinh_khoadaotao = @$row['quydinhkhoadaotao'];
        $khoadaotao->Hinhthuc_khoadaotao = @$row['hinhthuckhoadaotao'];
        $khoadaotao->Doituong_khoadaotao = @$row['doituongkhoadaotao'];
        $khoadaotao->ID_nhanvien = @$row['manhanvien'];
        $khoadaotao->ID_phongban = @$row['maphongban'];
        $khoadaotao->ID_chucvu = @$row['machucvu'];
        
        $khoadaotao->Sobuoi_khoadaotao = @$row['sobuoikhoadaotao'];

        $khoadaotao->Noidung = @$row['noidung'];
        $khoadaotao->Muctieu = @$row['muctieu']
        $khoadaotao->Trangthai = @$row['trangthai'];
        $khoadaotao->Ghichu = @$row['ghichu'];

        return $khoadaotao;
    }
}
