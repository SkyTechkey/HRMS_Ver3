<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class GiamTruGiaCanh extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_giam_tru_gia_canh')->insert([
            'Ten_nguoiquanhe' =>'Dương Văn Nhiều',
            'ID_Loaiquanhe' => 1,
            'Ngaysinh' => '2000/05/07',
            'Diachihientai' =>'Đà Nẵng',
            'Nghenghiep' =>'IT',
            'Sodienthoai' =>'0705944149',
            'SoCMND'=>'212618080',
            'Ngaycap' =>'2017/09/07',
            'Noicap' =>'Quảng Ngãi',
            'Ngaybatdaugiamtru' =>'2021/09/01',
            'Ngayketthucgiamtru' =>   '2021/09/10/',
            'MaNPT' =>  '123', 
            'Ghichu' =>   'Hoàn thành'
        ]);
    }
}
