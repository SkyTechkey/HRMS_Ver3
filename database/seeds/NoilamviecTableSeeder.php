<?php

use Illuminate\Database\Seeder;

class NoilamviecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tbl_noilamviec')->insert([
            'Tenchinhanh' => 'Da nang',
            'Diachi' => '320 duong 2/9, quan Hai Chau, Da Nang'
        ]);
    }
}
