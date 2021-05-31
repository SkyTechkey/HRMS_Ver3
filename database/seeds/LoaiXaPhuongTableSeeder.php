<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class LoaiXaPhuongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tbl_loai_xa_phuong')->truncate();
        $tbl_loai_xa_phuong = [
            ['Phường'],
            ['Thị trấn'],
            ['Xã']
        ];

        foreach($tbl_loai_xa_phuong as $tbl_loai_xa_phuong) {
            Database\LoaiXaPhuong::create([
                'xa/phuong' => $tbl_loai_xa_phuong[0],
            ]);
        }
    }
}
