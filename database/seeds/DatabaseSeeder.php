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
<<<<<<< HEAD
      //

   	    $this->call(UserTableSeeder::class);
        $this->call(DantocTableSeeder::class);
        $this->call(NgoainguTableSeeder::class);


        $this->call(RolePermissitonSeeder::class);
=======
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
>>>>>>> 885ed6c9 (Update-TinhThanh)
    }
}
