<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HocVanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_trinh_do_hoc_van')->insert([
            'pho_thong' => 'học',
            'cao_dang' => 'Bỏ',
            'dai_hoc' => 'Tốt',
            'cao_hoc' => 'Bỏ'
        ]);
    }
}
