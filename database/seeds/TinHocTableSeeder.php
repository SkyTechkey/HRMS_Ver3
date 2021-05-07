<?php

use Illuminate\Database\Seeder;
use App\Models\TinHoc;

class TinHocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_tin_hoc')->insert([
            'word' => 'Tốt',
            'excel' => 'Tốt',
            'power_point' => 'Tốt'
        ]);
    }
}
