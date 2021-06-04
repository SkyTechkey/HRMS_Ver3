<?php

use Illuminate\Database\Seeder;

class NghiLeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_nghi_le')->insert([
            'Ten_nghile' => 'Tết đoan ngọ',
            'Nam' => 2020,
            'Ngaynghi' => '2020/02/07',
            'Loai' => 'Nghỉ lễ',
            'Heso' => 20,
            'Ghichu' => ''
        ]);
    }
}
