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
        // Thêm phân quyền quản trị phụ cấp
        $permission = Permission::create(['name' => 'View.PhuCap']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.PhuCap']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.PhuCap']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.PhuCap']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.PhuCap']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.PhuCap']);
        $permission->assignRole($role);

        


    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
