<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // User seeder will use the roles above created.
   	    // $this->call(UserTableSeeder::class);
        // $this->call(DataBranch::class);

        // $this->call(LoaiTinhThanhTableSeeder::class);
        // $this->call(LoaiQuanHuyenTableSeeder::class);
        // $this->call(LoaiXaPhuongTableSeeder::class);
    
        $this->call(TinhThanhTableSeeder::class);
        $this->call(QuanHuyenTableSeeder::class);
        $this->call(XaPhuongTableSeeder::class);
    }
}
