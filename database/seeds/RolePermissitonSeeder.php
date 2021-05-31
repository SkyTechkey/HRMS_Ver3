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
        // Thêm phân quyền quản trị chi nhánh
        $permission = Permission::create(['name' => 'View.ChiNhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.ChiNhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.ChiNhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.ChiNhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.ChiNhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.ChiNhanh']);
        $permission->assignRole($role);

        // Thêm phân quyền quản trị phòng ban
        $permission = Permission::create(['name' => 'View.PhongBan']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.PhongBan']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.PhongBan']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.PhongBan']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.PhongBan']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.PhongBan']);
        $permission->assignRole($role);



    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
