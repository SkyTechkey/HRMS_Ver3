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

        // Thêm phân quyền quản trị ngoại ngữ
        $permission = Permission::create(['name' => 'View.NgoaiNgu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.NgoaiNgu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.NgoaiNgu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.NgoaiNgu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.NgoaiNgu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.NgoaiNgu']);
        $permission->assignRole($role);

        // Thêm phân quyền quản trị dân tộc
        $permission = Permission::create(['name' => 'View.DanToc']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.DanToc']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.DanToc']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.DanToc']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.DanToc']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.DanToc']);
        $permission->assignRole($role);
        
        


    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
