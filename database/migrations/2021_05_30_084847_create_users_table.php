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
            $table->bigIncrements('id');
            $table->string('Hovaten')->nullable();
            $table->string('Tenthuonggoi')->nullable();
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('Gioitinh')->nullable();
            $table->date('Ngayvaolam')->nullable();
            $table->string('Sodienthoai')->nullable();
            $table->string('Email')->nullable();
            $table->string('Socmnd')->nullable();
            $table->date('ngaycapCMND')->nullable();
            $table->string('NoicapCMND')->nullable();
            $table->date('Ngaysinh')->nullable();
            $table->text('Noisinh')->nullable();

            $table->text('Diachithuongtru')->nullable();
            $table->text('Diachitamtru')->nullable();
	          $table->string('Masothue')->nullable();
            $table->string('Sotaikhoan')->nullable();

            $table->date('Ngayvaocongdoan')->nullable();
            $table->date('Ngayvaodoan')->nullable();
            $table->date('Ngayvaodang')->nullable();
            $table->string('Tinhtranghonnhan')->nullable();

            $table->string('Hinhanh')->nullable();
            $table->text('Ghichu')->nullable();
            $table->text('Trangthai')->nullable();
            $table->string('role')->nullable();
            $table->string('HinhthucNV')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('ID_Tongiao')->nullable();
            
            
            $table->string('ID_Noilamviec')->nullable();
            $table->unsignedBigInteger('ID_Hocvan')->nullable();
            $table->unsignedBigInteger('ID_Chucvu')->nullable();
            $table->unsignedBigInteger('ID_Chinhanh')->nullable();
            $table->unsignedBigInteger('ID_Phongban')->nullable();
            $table->unsignedBigInteger('ID_Quoctich')->nullable();
            $table->unsignedBigInteger('ID_Dantoc')->nullable();
            $table->unsignedBigInteger('ID_Tinhthuongtru')->nullable();
            $table->unsignedBigInteger('ID_Quanthuongtru')->nullable();
            $table->unsignedBigInteger('ID_Xathuongtru')->nullable();
            $table->unsignedBigInteger('ID_Tinhtamtru')->nullable();
            $table->unsignedBigInteger('ID_Quantamtru')->nullable();
            $table->unsignedBigInteger('ID_Xatamtru')->nullable();
            
            
          // $table->unsignedBigInteger('ID_Nguoigioithieu')->nullable();

          //  $table->unsignedBigInteger('ID_Nganhang')->nullable();
          //  $table->unsignedBigInteger('ID_HinhthucNV')->nullable();
          //  $table->unsignedBigInteger('ID_Ngoaingu')->nullable();

            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->foreign('ID_Chucvu')->references('id')->on('tbl_chucvu')->onDelete('set null');
            $table->foreign('ID_Chinhanh')->references('id')->on('tbl_chinhanh')->onDelete('set null');
            $table->foreign('ID_Phongban')->references('id')->on('tbl_phongban')->onDelete('set null');
            $table->foreign('ID_Quoctich')->references('id')->on('tbl_quoctich')->onDelete('set null');
           $table->foreign('ID_Dantoc')->references('id')->on('tbl_dantoc')->onDelete('set null');
           $table->foreign('ID_Tinhthuongtru')->references('id')->on('tbl_tinhthanhpho')->onDelete('set null');
           $table->foreign('ID_Quanthuongtru')->references('id')->on('tbl_quanhuyen')->onDelete('set null');
           $table->foreign('ID_Xathuongtru')->references('id')->on('tbl_xaphuong')->onDelete('set null');
           $table->foreign('ID_Tinhtamtru')->references('id')->on('tbl_tinhthanhpho')->onDelete('set null');
           $table->foreign('ID_Quantamtru')->references('id')->on('tbl_quanhuyen')->onDelete('set null');
           $table->foreign('ID_Xatamtru')->references('id')->on('tbl_xaphuong')->onDelete('set null');
           

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
