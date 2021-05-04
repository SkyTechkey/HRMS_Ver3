<?php

use Illuminate\Database\Seeder;
use App\Dantoc;


class tbl_dan_toc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dan_toc = new Dantoc();
        $dan_toc->ten = 'Tay';
    }
}
