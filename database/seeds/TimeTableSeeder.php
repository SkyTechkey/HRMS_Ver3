<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_time')->insert([
            'time'=>'2021-07-06', '17:00:00'
        ]);
    }
}
