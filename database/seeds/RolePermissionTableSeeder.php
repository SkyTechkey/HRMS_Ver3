<?php

use Illuminate\Database\Seeder;
use App\RolePermission;
class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new RolePermission();
        $employee->id_role = 1;
        $employee->id_pms = 1;
        $employee->save();
    }
}
