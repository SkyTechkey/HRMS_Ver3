<?php

use Illuminate\Database\Seeder;

class NganhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tbl_nganhang')->insert([
            'Tennganhang' => 'BIDV',
            'Diachi' => 'Da Nang'
        ]);
    }
}
