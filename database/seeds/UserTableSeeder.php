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


        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'salary' => '10000$',
            'phone' => '0781499969',
            'password' => bcrypt('123456'),
      ]);
      DB::table('users')->insert([
            'name' => 'staff',
            'username' => 'staff',
            'email' => 'staff@gmail.com',
            'salary' => '10000$',
            'phone' => '0781499969',
            'password' => bcrypt('123456'),
      ]);

      $role = Role::create(['name' => 'admin']);
      $permission = Permission::create(['name' => 'xem']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'them']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'sua']);
      $permission->assignRole($role);
      $permission = Permission::create(['name' => 'xoa']);
      $permission->assignRole($role);
      $role = Role::create(['name' => 'employee']);
      $user = \App\User::where('email', 'admin@gmail.com')->first();
      $user->givePermissionTo('xem', 'them', 'sua', 'xoa');
      $user->assignRole('admin');
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
