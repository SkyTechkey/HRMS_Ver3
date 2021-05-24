<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class XaPhuongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'1',
            'Tenxaphuong'=>'An Hai Bac',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'1',
            'Tenxaphuong'=>'Nai Hien Dong',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'1',
            'Tenxaphuong'=>'An Hai Nam',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'2',
            'Tenxaphuong'=>'Thuan Phuoc',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'2',
            'Tenxaphuong'=>'Thach Thang',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'2',
            'Tenxaphuong'=>'Phuoc Ninh',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'3',
            'Tenxaphuong'=>'Hoa Minh',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'3',
            'Tenxaphuong'=>'Hoa Khanh Nam',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'3',
            'Tenxaphuong'=>'Hoa Khanh Bac',
            'Trangthai'=>'oke'
            
        ]);

        //  Sai Gon
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'4',
            'Tenxaphuong'=>'Phuong 1',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'4',
            'Tenxaphuong'=>'Phuong 2',
            'Trangthai'=>'oke'
            
        ]);
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'4',
            'Tenxaphuong'=>'Phuong 3',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'5',
            'Tenxaphuong'=>'Ben Nghe',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'5',
            'Tenxaphuong'=>'Hoa BInh',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'5',
            'Tenxaphuong'=>'Tu Duc',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'6',
            'Tenxaphuong'=>'Binh Hung',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'6',
            'Tenxaphuong'=>'Binh Tri Dong',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'6',
            'Tenxaphuong'=>'Hung LOng',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'7',
            'Tenxaphuong'=>'Cat Linh',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'7',
            'Tenxaphuong'=>'Hang Bot',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'7',
            'Tenxaphuong'=>'Kham Thien',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'8',
            'Tenxaphuong'=>'Dien Bien',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'8',
            'Tenxaphuong'=>'Doi Can',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'8',
            'Tenxaphuong'=>'Kim Ma',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'9',
            'Tenxaphuong'=>'Dich Vong',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'9',
            'Tenxaphuong'=>'Mai Dich',
            'Trangthai'=>'oke'
            
        ]); 
        DB::table('tbl_xaphuong')->insert([
            'ID_Quanhuyen'=>'9',
            'Tenxaphuong'=>'Nghia Do',
            'Trangthai'=>'oke'
            
        ]); 

    }
}
