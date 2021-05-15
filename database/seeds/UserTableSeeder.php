<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_tongiao')->insert([
            'TenTG_Tongiao' => 'cao dai',
        ]);
        DB::table('tbl_tongiao')->insert([
            'TenTG_Tongiao' => 'phat giao',
        ]);
        DB::table('tbl_tongiao')->insert([
            'TenTG_Tongiao' => 'thien chua giao',
        ]);

        DB::table('tbl_quoctich')->insert([
            'TenQT_Quoctich' => 'Vietnam',
        ]);
        DB::table('tbl_quoctich')->insert([
            'TenQT_Quoctich' => 'America',
        ]);
        DB::table('tbl_quoctich')->insert([
            'TenQT_Quoctich' => 'Singapore',
        ]);

        DB::table('tbl_ngoaingu')->insert([
            'TenNN_Ngoaingu' => 'tieng Anh',
        ]);
        DB::table('tbl_ngoaingu')->insert([
            'TenNN_Ngoaingu' => 'tieng Phap',
        ]);
        DB::table('tbl_ngoaingu')->insert([
            'TenNN_Ngoaingu' => 'tieng Lao',
        ]);
        DB::table('users')->insert([
            'Hovaten' => 'Ho Van Vinh',
            'Tenthuonggoi' => 'Vinh ez',
            'Gioitinh' => 'Nam',
            'Ngayvaolam' => '2021/03/16',
            'Sodienthoai' => '0705944149',
            'Email' => 'vinh.hvdn@gmail.com',
            'Socmnd' => '212618080',
            'NgaycapCMND' => '2021/03/16',
            'NoicapCMND' => 'Da Nang',
            'Ngaysinh' => '1989/11/20',
            'ID_Phongban' => 1,
            'ID_Chucvu' => 1,
            'ID_Noilamviec' => 1,
            'Diachithuongtru' => 'Da Nang',
            'Diachitamtru' => 'Da Nang',
            'Masothue' => 9999,
            'Sotaikhoan' => 15421121221,
            'ID_Nganhang' => 1,
            'Ngayvaocongdoan' => '2021/03/16',
            'Ngayvaodoan' => '2016/03/26',
            'Ngayvaodang' => '2018/03/16',
            'ID_Quoctich' => 1,
            'ID_Tongiao' => 1,
            'ID_Dantoc' => 1,
            'ID_Nguoigioithieu' => 1,
            'Tinhtranghonnhan' => 'Đã kết hôn',
            'ID_HinhthucNV' => 1,
            'Hinhanh' => 'vinh.jpg',
            'Ghichu' => 'Dep choai',
            'Trangthai' => 'Đang làm việc',
            'username' => 'admin',
            'password' => bcrypt('123456')
            ]);
    /*    DB::table('users')->insert([
            'Hovaten' => 'Nguyễn văn A',
            'username' => 'Anv',
            'password' => bcrypt('123456'),
            'email' => 'admin@gmail.com',
            'Sodienthoai' => '0781499969',
            'Tenthuonggoi' => 'Vinh ez',
	        'Gioitinh' => 'Nam',
	        'Ngayvaolam' => '2000/07/05'

      ]);
      DB::table('users')->insert([
            'Hovaten' => 'staff',
            'username' => 'staff',
            'password' => bcrypt('123456'),
            'email' => 'staff@gmail.com',
            'Sodienthoai' => '0781499969'

      ]);
*/
      $role = Role::create(['name' => 'admin']);
      $permission = Permission::create(['name' => 'xem']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'them']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'sua']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'xoa']);
      $permission->assignRole($role);
      //$role = Role::create(['name' => 'employee']);
     // $user = \App\User::where('email', 'admin@gmail.com')->first();
    //  $user->givePermissionTo('xem', 'them', 'sua', 'xoa');
     // $user->assignRole('admin');
      //   DB::table('users')->insert([
      //       'name' => 'nhandzz',
      //       'username' => 'admin1',
      //       'email' => 'admin1234@gmail.com',
      //       'salary' => '1000$',
      //       'role' => 'Giám đốc',
      //       'staff' => '0',
      //       'phone' => '0781499969',
      //       'password' => bcrypt('123456'),
      // ]);
      //   DB::table('users')->insert([
      //       'name' => 'nhandzz',
      //       'username' => 'admin',
      //       'email' => 'admin123@gmail.com',
      //       'salary' => '1000$',
      //       'role' => 'Giám đốc',
      //       'staff' => '1',
      //       'phone' => '0781499969',
      //       'password' => bcrypt('123456'),
      // ]);
      // $this->call(RoleTableSeeder::class);
      // $this->call(PermissionTableSeeder::class);
      // // User seeder will use the roles above created.
      // $this->call(UserTableSeeder::class);
    }
}
