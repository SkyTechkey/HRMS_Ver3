<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class LoaiTinhThanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tbl_loai_tinh_thanh')->truncate();
        $tbl_loai_tinh_thanh = [
            ['Thành phố Trung ương'],
            ['Tỉnh'],
        ];

        foreach ($tbl_loai_tinh_thanh as $tbl_loai_tinh_thanh) {
            Database\LoaiTinhThanh::create([
                'tinh/thanh' => $tbl_loai_tinh_thanh[0],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
