<?php

use Illuminate\Database\Seeder;

class AllTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_permissions')->insert([
            ['Chophep' => 'view'],
            ['Chophep' => 'create'],
            ['Chophep' => 'update_'],
            ['Chophep' => 'delete'],
            ['Chophep' => 'export'],
            ['Chophep' => 'import'],
        ]);

        DB::table('tbl_roles')->insert([
            ['Vaitro' => 'admin'],
            ['Vaitro' => 'user'],
        ]);
        DB::table('tbl_role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('tbl_permission_role')->insert([
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 1],
            ['permission_id' => 3, 'role_id' => 1],
            ['permission_id' => 4, 'role_id' => 1],
            ['permission_id' => 5, 'role_id' => 1],
            ['permission_id' => 6, 'role_id' => 1],
        ]);
    }
}
