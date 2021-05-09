<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Add_Role_phongbanchucvu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->get();
        $permission = Permission::create(['name' => 'show.phongban']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'add.phongban']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'edit.phongban']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'del.phongban']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'import.phongban']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'export.phongban']);
        $permission->assignRole($role);

        $permission = Permission::create(['name' => 'show.chucvu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'add.chucvu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'edit.chucvu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'del.chucvu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'import.chucvu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'export.chucvu']);
        $permission->assignRole($role);
    }
}
