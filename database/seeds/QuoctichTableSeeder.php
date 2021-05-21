<?php

use Illuminate\Database\Seeder;

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
            'TenQT_Quoctich' => 'Viet Nam'
        ]);
    }
}
