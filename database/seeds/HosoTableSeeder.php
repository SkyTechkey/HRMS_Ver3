<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HosoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_hoso')->insert([
        'ID_username' => '1',
        
        'ID_loaihoso' => '1',
        
        
        'Trangthai' => 'Chờ duyệt',
        

        ]);
        DB::table('tbl_hoso')->insert([
        'ID_username' => '1',
        
        'ID_loaihoso' => '2',
        
        
        'Trangthai' => 'Chờ duyệt',
        

        ]);
        DB::table('tbl_hoso')->insert([
            'ID_username' => '1',
            
            'ID_loaihoso' => '3',
            
            
            'Trangthai' => 'Chờ duyệt',
            
    
        ]);
    }
}
