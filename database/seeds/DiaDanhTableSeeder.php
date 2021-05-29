<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class DiaDanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('tbl_dia_danh')->truncate();
        // $tbl_dia_danh = [
        //     1,
        //     1,
        //     1,
        // ];

        // foreach ($tbl_dia_danh as $tbl_dia_danh) {
        //     Database\LoaiQuanHuyen::create([
        //         'id_tinhthanh' => $tbl_dia_danh[0],
        //         'id_quanhuyen' => $tbl_dia_danh[1],
        //         'id_xaphuong' => $tbl_dia_danh[2],

        //     ]);
        // }

        // Schema::enableForeignKeyConstraints();
        DB::table('tbl_dia_danh')->insert([
            'id_tinhthanh' => 1,
            'id_quanhuyen' => 1,
            'id_xaphuong' => 1
        ]);
        // Thêm phân quyền quản trị menu settting
        // $permission = Permission::create(['name' => 'View.Settings']);
        // $permission->assignRole($role);
        // $permission = Permission::create(['name' => 'View.Role']);
        // $permission->assignRole($role);
        // $permission = Permission::create(['name' => 'Edit.Role']);
        // $permission->assignRole($role);
        // $permission = Permission::create(['name' => 'Delete.Role']);
        // $permission->assignRole($role);

    // Gán quyền cho admin
        // $user = \App\User::where('username', 'admin')->first();
        // $user->assignRole('admin');
    }
}
