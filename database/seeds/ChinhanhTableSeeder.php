<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ChinhanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_chinhanh')->insert([

            'Ten_chinhanh' => 'Tiếng Anh A',
            'Diachi' => 'Đường 2/9 - TP.Đà Nẵng',
            'Trangthai' => 'Hoạt động'
            ]);
    }
}
