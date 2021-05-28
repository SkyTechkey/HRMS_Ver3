<?php

use Illuminate\Database\Seeder;

class NoiLamViecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_noi_lam_viec')->insert([
            'Tenchinhanh' => 'Đà nẵng',
            'Id_Diachi' =>1,
        ]);
    }
}
