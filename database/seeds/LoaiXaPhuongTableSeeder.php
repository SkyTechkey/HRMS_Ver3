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
        DB::table('tbl_loaixaphuong')->truncate();
        $tbl_loaixaphuong = [
            ['Phường'],
            ['Thị trấn'],
            ['Xã']
        ];

        foreach($tbl_loaixaphuong as $tbl_loaixaphuong) {
            Database\LoaiXaPhuong::create([
                'loaixaphuong' => $tbl_loaixaphuong[0]
            ]);
        }

        Schema::enableForeignKeyConstraints();
        // DB::table('tbl_loaixaphuong')->insert(
        //     ['loaixaphuong' => 'Phường'],
        //     ['loaixaphuong' => 'Thị trấn'],
        //     ['loaixaphuong' => 'Xã']
        // );
    }
}
