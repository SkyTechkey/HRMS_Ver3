<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class LoaiQuanHuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('tbl_loai_quan_huyen')->truncate();
        $tbl_loai_quan_huyen = [
            ['Thành phố'],
            ['Quận'],
            ['Huyện'],
            ['Thị xã']
        ];

        foreach ($tbl_loai_quan_huyen as $tbl_loai_quan_huyen) {
            Database\LoaiQuanHuyen::create([
                'quan/huyen' => $tbl_loai_quan_huyen[0],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
