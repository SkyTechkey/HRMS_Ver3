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
            $table->string('Hovaten');
            $table->string('Tenthuonggoi');
            $table->string('Gioitinh');
            $table->date('Ngayvaolam');
            $table->string('Sodienthoai');
            $table->string('Email');
            $table->string('Socmnd');
            $table->date('ngaycapCMND');
            $table->string('NoicapCMND');
            $table->date('Ngaysinh');
            $table->text('Noisinh');
            $table->unsignedBigInteger('ID_Phongban');
            $table->unsignedBigInteger('ID_Chucvu');
            $table->unsignedBigInteger('ID_Noilamviec');
            $table->text('Diachithuongtru');
            $table->text('Diachitamtru');
            $table->string('Masothue');
            $table->string('Sotaikhoan');
            $table->unsignedBigInteger('ID_Nganhang');
            $table->date('Ngayvaocongdoan');
            $table->date('Ngayvaodoan');
            $table->date('Ngayvaodang');
            $table->unsignedBigInteger('ID_Quoctich');
            $table->unsignedBigInteger('ID_Tongiao');
            $table->unsignedBigInteger('ID_Dantoc');
            $table->unsignedBigInteger('ID_Nguoigioithieu');
            $table->string('Tinhtranghonnhan');
            $table->unsignedBigInteger('ID_HinhthucNV');
            $table->string('Hinhanh');
            $table->text('Ghichu');
            $table->text('Trangthai');
            $table->string('username');
            $table->string('password');

            $table->unsignedBigInteger('tongiao');
            $table->unsignedBigInteger('quoctich');
            $table->unsignedBigInteger('ngoaingu');

            $table->rememberToken();
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
