<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\User;

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
            $table->bigIncrements('id');
            $table->string('Hovaten')->nullable();
            $table->string('Tenthuonggoi')->nullable();
            $table->string('Gioitinh')->nullable();
            $table->date('Ngayvaolam')->nullable();
            $table->string('Sodienthoai')->nullable();
            $table->string('Email')->nullable();
            $table->string('Socmnd')->nullable();
            $table->date('ngaycapCMND')->nullable();
            $table->string('NoicapCMND')->nullable();
            $table->date('Ngaysinh')->nullable();
            $table->text('Noisinh')->nullable();
            $table->unsignedBigInteger('ID_Phongban')->nullable();
            $table->unsignedBigInteger('ID_Chucvu')->nullable();
            $table->unsignedBigInteger('ID_Noilamviec')->nullable();
            $table->text('Diachithuongtru')->nullable();
            $table->text('Diachitamtru')->nullable();
            $table->string('Masothue')->nulltablle();
            $table->string('Sotaikhoan')->nulltablle();
            $table->unsignedBigInteger('ID_Nganhang')->nulltablle();
            $table->date('Ngayvaocongdoan')->nulltablle();
            $table->date('Ngayvaodoan')->nulltablle();
            $table->date('Ngayvaodang')->nulltablle();
            $table->unsignedBigInteger('ID_Quoctich')->nulltablle();
            $table->unsignedBigInteger('ID_Tongiao')->nulltablle();
            $table->unsignedBigInteger('ID_Dantoc')->nulltablle();
            $table->unsignedBigInteger('ID_Nguoigioithieu')->nulltablle();
            $table->string('Tinhtranghonnhan')->nulltablle();
            $table->unsignedBigInteger('ID_HinhthucNV')->nulltablle();
            $table->string('Hinhanh')->nulltablle();
            $table->text('Ghichu')->nulltablle();
            $table->text('Trangthai')->nulltablle();
            $table->string('username')->nulltablle();
            $table->string('password')->nulltablle();

            $table->string('role')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('tongiao')->nullable();
            $table->unsignedBigInteger('quoctich')->nullable();
            $table->unsignedBigInteger('ngoaingu')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken()->nullable();
            $table->timestamps();

            $table->foreign('tongiao')->references('id')->on('tbl_tongiao');
            $table->foreign('quoctich')->references('id')->on('tbl_quoctich');
            $table->foreign('ngoaingu')->references('id')->on('tbl_ngoaingu');
            //nhieu
            $table->foreign('ID_Noilamviec')->references('id')->on('tbl_noilamviec');
            $table->foreign('ID_Nganhang')->references('id')->on('tbl_nganhang');
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
