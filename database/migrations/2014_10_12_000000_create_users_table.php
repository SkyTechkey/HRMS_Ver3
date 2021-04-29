<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_role')->unsigned();
            $table->string('MaNV');
            $table->string('HoTen');
            $table->string('BiDanh');
            $table->string('HinhAnh');
            $table->string('GioiTinh');
            $table->date('NgaySinh');
            $table->string('NoiSinh');
            $table->string('CMND');
            $table->date('NgayCapCMND');
            $table->string('NoiCapCMND');
            $table->integer('ID_DanToc')->unsigned();
            $table->integer('ID_TonGiao')->unsigned();
            $table->integer('ID_QuocTich')->unsigned();
            $table->string('TTHonNhan');
            $table->string('QueQuan');
            $table->string('Dc_TTru');
            $table->string('NoiOHienTai');
            $table->integer('DTNha');
            $table->integer('DienThoaiDD');
            $table->string('TP_XT');
            $table->string('UTGiaDinh');
            $table->string('UTBanThan');
            $table->string('NangKhieu');
            $table->string('TTSucKhoe');
            $table->string('NhomMau');
            $table->string('ChieuCao');
            $table->string('CanNang');
            $table->string('KhuyetTat');
            $table->date('NgayTuyenDung');
            $table->string('HT_TuyenDung');
            $table->string('CQ_TuyenDung');
            $table->date('NVeCoQuan');
            $table->string('SQDinh');
            $table->string('CVDuocGiao');
            $table->string('CVHienTai');
            $table->date('NVNgayGiaoDuc');
            $table->integer('ID_PhongBan')->unsigned();
            $table->integer('ID_ChucVu')->unsigned();
            $table->string('ViTriTuyenDung');
            $table->date('NgayVaoDang');
            $table->date('NgayVaoDoan');
            $table->string('ChucVu');
            $table->date('NgayVaoCongDoan');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
