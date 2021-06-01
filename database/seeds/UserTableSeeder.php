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
        DB::table('users')->insert([
            'Hovaten' => 'Ho Van Vinh',
            'Hinhanh' => 'vinh.jpg',
            'Ghichu' => 'Dep choai',
            'Trangthai' => 'Đang làm việc',

            'username' => 'admin',
            'password' => bcrypt('123456')
            ]);
    }
}
