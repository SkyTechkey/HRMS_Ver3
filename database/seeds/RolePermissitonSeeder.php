<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissitonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        // Thêm phân quyền quản trị phòng ban
        $permission = Permission::create(['name' => 'View.KhoaDaoTao']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.KhoaDaoTao']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.KhoaDaoTao']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.KhoaDaoTao']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.KhoaDaoTao']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.KhoaDaoTao']);
        $permission->assignRole($role);



    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
