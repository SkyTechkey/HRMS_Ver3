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
<<<<<<< HEAD
   	 $this->call(UserTableSeeder::class);
        $this->call(DataBranch::class);

        //gọi seeds quyền setting
       // $this->call(settingSeeder::class);

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
>>>>>>> origin/QuanLyTinhThanh-NoiLamViec-ChiNhanh-Nhieu
=======
      //

   	    $this->call(UserTableSeeder::class);
        $this->call(QuoctichTableSeeder::class);
        $this->call(NgoainguTableSeeder::class);
        $this->call(ChinhanhTableSeeder::class);
        
        $this->call(RolePermissitonSeeder::class);
>>>>>>> origin/QuanLyQuocTich_Viet
    }
}
