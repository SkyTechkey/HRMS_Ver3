<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NgoainguTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_trinhdongoaingu')->insert([

            'Ten_ngoaingu' => 'Tiếng Anh A',
            'Trangthai' => 'Hoạt động'
            ]);
    }
}
