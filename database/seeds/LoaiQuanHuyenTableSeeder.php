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
        DB::table('tbl_loaiquanhuyen')->truncate();
        $tbl_loaiquanhuyen = [
            ['Thành phố'],
            ['Quận'],
            ['Huyện'],
            ['Thị xã']
        ];

        foreach ($tbl_loaiquanhuyen as $tbl_loaiquanhuyen) {
            Database\LoaiQuanHuyen::create([
                'loaiquanhuyen' => $tbl_loaiquanhuyen[0],
            ]);
        }

        Schema::enableForeignKeyConstraints();

        // DB::table('tbl_loaiquanhuyen')->insert(
        //     ['loaiquanhuyen' => 'Thành phố'],
        //     ['loaiquanhuyen' => 'Quận'],
        //     ['loaiquanhuyen' => 'Huyện'],
        //     ['loaiquanhuyen' => 'Thị xã']
        // );
    }
}
