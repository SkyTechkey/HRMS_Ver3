<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employee = new User();
       $employee->name = 'Employee Name';
       $employee->email = 'vinh@gmail.com';
       $employee->password = bcrypt('12345678');
       $employee->id_role = 1;
       $employee->MaNV = 'NV01';
       $employee->HoTen = 'Ho Van Vinh';
       $employee->BiDanh = 'Vinh';
       $employee->HinhAnh = 'hinh.jpg';
       $employee->GioiTinh = 'Nam';
       $employee->NgaySinh = '2000/07/05';
       $employee->NoiSinh = 'Quang Nam';
       $employee->CMND = '212618080';
       $employee->NgayCapCMND = '2000/07/05';
       $employee->NoiCapCMND = 'Quang Nam';
       $employee->ID_DanToc = 1;
       $employee->ID_TonGiao = 1;
       $employee->ID_QuocTich = 1;
       $employee->TTHonNhan = 'Mot Vo Mot Con';
       $employee->QueQuan = 'QuangNam';
       $employee->Dc_TTru = 'Hoa Quy, Da Nang';
       $employee->NoiOHienTai = 'Hoa Quy, Da Nang';
       $employee->DTNha = '0705944149';
       $employee->DienThoaiDD = '0705944149';
       $employee->TP_XT = 'Khong biet';
       $employee->UTGiaDinh = 'Gia dinh';
       $employee->UTBanThan = 'Gia dinh';
       $employee->NangKhieu = 'Tia gai';
       $employee->TTSucKhoe = 'On Dinh';
       $employee->NhomMau = 'D';
       $employee->ChieuCao = '18,0cm';
       $employee->CanNang = '56,0kg';
       $employee->KhuyetTat = 'Khong';
       $employee->NgayTuyenDung = '2021/03/16';
       $employee->HT_TuyenDung = 'Phỏng Vấn';
       $employee->CQ_TuyenDung = 'SKYTECH';
       $employee->NVeCoQuan = '2021/03/18';
       $employee->SQDinh = 'NV01_03';
       $employee->CVDuocGiao = 'Develop';
       $employee->CVHienTai = 'Develop';
       $employee->NVNgayGiaoDuc = '2021/11/03';
       $employee->ID_PhongBan = 1;
       $employee->ID_ChucVu = 1;
       $employee->ViTriTuyenDung = 'Intern';
       $employee->NgayVaoDang = '2021/01/09';
       $employee->NgayVaoDoan = '2018/12/14';
       $employee->ChucVu = 'Thanh Nien';
       $employee->NgayVaoCongDoan = '2020/10/23';
       $employee->save();
    }
}
