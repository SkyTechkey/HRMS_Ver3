<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QuoctichTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_quoctich')->insert([

            'Ten_quoctich' => 'Việt Nam',
            'Trangthai' => 'Hoạt động'
            ]);
    }
}
