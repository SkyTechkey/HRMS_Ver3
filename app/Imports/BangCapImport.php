<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\HoSoBangCap;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class BangCapImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function headingRow() : int
        {
            return 1;
        }
    public function collection(Collection $collection)
    {
        $hosobangcap = new HoSoBangCap();

        $hosobangcap->ID_Username = @$row['Username'];
        $hosobangcap->ID_Loaibangcap = @$row['Bang_cap'];
        $hosobangcap->ID_Trinhdochuyenmon = @$row['Trinh_do_chuyen_mon'];
        $hosobangcap->Noitotnghiep = @$row['Noi_tot_nghiep'];
        $hosobangcap->Namtotnghiep = @$row['Nam_tot_nghiep'];
        $hosobangcap->Ghichu = @$row['Ghi_chu'];
        $hosobangcap->Dinhkem = @$row['Dinh_kem'];
        $hosobangcap->Trangthai = @$row['Trang_thai'];

        return $hosobangcap;
    }
}
