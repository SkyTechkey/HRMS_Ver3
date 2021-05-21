<?php

use Illuminate\Database\Seeder;

class TongiaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_tongiao')->insert([
           'TenTG_Tongiao' => 'Kinh',
        ]);
    }
}
