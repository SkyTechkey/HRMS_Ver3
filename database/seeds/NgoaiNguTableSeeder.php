<?php

use Illuminate\Database\Seeder;

class NgoaiNguTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_ngoai_ngu')->insert([
            'ten_ngoai_ngu' => 'Tiếng Anh',
            'ten_tin_chi' => 'Toeic'
        ]);
    }
}
