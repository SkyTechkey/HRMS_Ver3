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
        DB::table('tbl_loaitinhthanh')->truncate();
        $tbl_loaitinhthanh = [
            ['Thành phố Trung ương'],
            ['Tỉnh'],
        ];

        foreach ($tbl_loaitinhthanh as $tbl_loaitinhthanh) {
            Database\LoaiTinhThanh::create([
                'loaitinhthanh' => $tbl_loaitinhthanh[0],
            ]);
        }

        Schema::enableForeignKeyConstraints();
        // DB::table('tbl_loaitinhthanh')->insert(
        //     [ 'loaitinhthanh' => 'Thành phố Trung Ương' ],
        //     [ 'loaitinhthanh' => 'Tỉnh' ],
        // );
    }
}
