<?php

use Illuminate\Database\Seeder;

class HoSoBangCap extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_ho_so_bang_cap')->insert([
            'ID_Username' => 1,
            'ID_Loaibangcap' => 1,
            'ID_Trinhdochuyenmon' => 1,
            'Noitotnghiep' => 'Đà Nẵng',
            'Namtotnghiep' => 2018,
            'Trangthai' => 'Đã duyệt',
            'Ghichu' => 'Hoàn thành'
        ]);
    }
}
