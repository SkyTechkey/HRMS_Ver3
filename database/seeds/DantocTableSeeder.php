<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DantocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_dantoc')->insert([

            'Ten_dantoc' => 'Kinh',
            'Trangthai' => 'Hoạt động'
            ]);
    }
}
