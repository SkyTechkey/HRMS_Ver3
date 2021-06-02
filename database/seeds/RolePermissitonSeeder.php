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

        // Thêm phân quyền quản trị tuyển dụng
        $permission = Permission::create(['name' => 'View.TuyenDung']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.TuyenDung']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.TuyenDung']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.TuyenDung']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.TuyenDung']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.TuyenDung']);
        $permission->assignRole($role);

        // Thêm phân quyền quản trị tuyển dụng
        $permission = Permission::create(['name' => 'View.ChucVu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.ChucVu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.ChucVu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.ChucVu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.ChucVu']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.ChucVu']);
        $permission->assignRole($role);

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

        // Thêm phân quyền quản trị TỈNH THÀNH QUẬN HUYỆN
        $permission = Permission::create(['name' => 'View.TinhThanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.TinhThanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.TinhThanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.TinhThanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.TinhThanh']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.TinhThanh']);
        $permission->assignRole($role);

        // Thêm phân quyền quản trị QL NHÂN VIÊN
        $permission = Permission::create(['name' => 'View.NhanvienToanCT']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'View.NhanvienCN']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Edit.NhanvienCN']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Delete.NhanvienCN']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Create.NhanvienCN']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Import.NhanvienCN']);
        $permission->assignRole($role);
        $permission = Permission::create(['name' => 'Export.NhanvienCN']);
        $permission->assignRole($role);


    // Gán quyền cho admin cái này để ở cuối cùng. Viết 1 lần thôi k cần viết lại nhiều lần
        $user = \App\User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
