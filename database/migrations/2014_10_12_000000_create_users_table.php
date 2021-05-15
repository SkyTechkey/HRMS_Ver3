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
            $table->date('Socmnd')->nullable();
            $table->date('ngaycapCMND')->nullable();
            $table->string('NoicapCMND')->nullable();
            $table->date('Ngaysinh')->nullable();
            $table->text('Noisinh')->nullable();
            $table->unsignedBigInteger('ID_Phongban')->nullable();
            $table->unsignedBigInteger('ID_Chucvu')->nullable();
            $table->unsignedBigInteger('ID_Noilamviec')->nullable();
            $table->text('Diachithuongtru')->nullable();
            $table->text('Diachitamtru')->nullable();
            $table->text('Trangthai')->nullable();
//Nhiều bổ sung tiếp nhé. anh chỉ mới làm cái này chứ mấy. xem trong design rồi bố sung giúp anh nhé.


            $table->string('role')->nullable();
            $table->unsignedBigInteger('tongiao')->nullable();
            $table->unsignedBigInteger('quoctich')->nullable();
            $table->unsignedBigInteger('ngoaingu')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken()->nullable();
            $table->timestamps();

            $table->foreign('tongiao')->references('id')->on('tbl_tongiao');
            $table->foreign('quoctich')->references('id')->on('tbl_quoctich');
            $table->foreign('ngoaingu')->references('id')->on('tbl_ngoaingu');
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
