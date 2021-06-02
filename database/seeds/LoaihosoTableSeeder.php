<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaihosoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_loaihoso')->insert([
            'Ten_loaihoso' => 'Hồ sơ xin việc',
            'Trangthai' => 'Hoạt động',
            
            

            ]);

        DB::table('tbl_loaihoso')->insert([
            'Ten_loaihoso' => 'Hồ sơ nghĩ việc',
            'Trangthai' => 'Hoạt động',
            
            

        ]);
        DB::table('tbl_loaihoso')->insert([
            'Ten_loaihoso' => 'Hồ sơ nâng tiền lương',
            'Trangthai' => 'Hoạt động',
            
            

        ]);
    }
}
