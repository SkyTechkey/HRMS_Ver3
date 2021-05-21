<?php

use Illuminate\Database\Seeder;

class NgoainguTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_ngoaingu')->insert([
            'TenNN_Ngoaingu' => 'Tieng Anh'
        ]);
    }
}
