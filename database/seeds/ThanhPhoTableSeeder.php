<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ThanhPhoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_thanhpho')->insert([
            
            'Tenthanhpho'=>'Da nang',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_thanhpho')->insert([
            
            'Tenthanhpho'=>'Sai gon',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_thanhpho')->insert([
            
            'Tenthanhpho'=>'Ha noi',
            'Trangthai'=>'oke'
            
        ]);
    }
}
