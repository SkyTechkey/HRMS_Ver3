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
        $permission = Permission::create(['name' => 'View.Chinhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.Chinhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.Chinhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.Chinhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.Chinhanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.Chinhanh']);
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
        
        // Thêm phân quyền quản trị quốc tịch
        $permission = Permission::create(['name' => 'View.QuocTich']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.QuocTich']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.QuocTich']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.QuocTich']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.QuocTich']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.QuocTich']);
        $permission->assignRole($role);


    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
