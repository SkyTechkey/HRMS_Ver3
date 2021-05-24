<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QuanHuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'1',
            'Tenquanhuyen'=>'Son tra',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'1',
            'Tenquanhuyen'=>'Hai Chau',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'1',
            'Tenquanhuyen'=>'Lien Chieu',
            'Trangthai'=>'oke'
            
        ]);
        // Sai Gon
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'2',
            'Tenquanhuyen'=>'Quan 3',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'2',
            'Tenquanhuyen'=>'Quan Nhat',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'2',
            'Tenquanhuyen'=>'Quan Binh Chanh',
            'Trangthai'=>'oke'
            
        ]);
        // Ha Noi
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'3',
            'Tenquanhuyen'=>'Quan Dong Da',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'3',
            'Tenquanhuyen'=>'Quan Ba Dinh',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_quanhuyen')->insert([
            'ID_Thanhpho'=>'3',
            'Tenquanhuyen'=>'Quan Cau Giay',
            'Trangthai'=>'oke'
            
        ]);

    }
}
