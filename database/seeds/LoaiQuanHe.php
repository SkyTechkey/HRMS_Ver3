<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class LoaiQuanHe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConsTraints();
        DB::table('tbl_loai_quan_he')->truncate();
        $tbl_loai_quan_he = [
            ['Anh họ'],
            ['Anh ruột'],
            ['Bà nội / Bà ngoại'],
            ['Cha'],
            ['Cháu ruột'],
            ['Chị họ'],
            ['Chị ruột'],
            ['Con dưới 18 tuổi'],
            ['Mẹ'],
            ['Em'],
            ['Ông nội / Ông ngoại'],
        ];
        foreach($tbl_loai_quan_he as $tbl_loai_quan_he) {
            Database\LoaiQuanHe::create([
                'Ten_quanhe' => $tbl_loai_quan_he[0],
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
