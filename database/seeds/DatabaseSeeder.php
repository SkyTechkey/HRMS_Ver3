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
        // $this->call(DataBranch::class);
   	    // $this->call(UserTableSeeder::class);
        $this->call([
            // LoaiTinhThanhTableSeeder::class,
            // LoaiQuanHuyenTableSeeder::class,
            // LoaiXaPhuongTableSeeder::class
            TinhThanhTableSeeder::class,
            QuanHuyenTableSeeder::class,
            XaPhuongTableSeeder::class
        ]);
    }
}
