<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiamTruGiaCanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_giam_tru_gia_canh', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_nguoiquanhe');
            $table->unsignedBigInteger('ID_Loaiquanhe');
            $table->foreign('ID_Loaiquanhe')->references('id')->on('tbl_loai_quan_he');
            $table->date('Ngaysinh');
            $table->string('Diachihientai');
            $table->string('Nghenghiep');
            $table->string('Sodienthoai');
            $table->string('SoCMND');
            $table->date('Ngaycap');
            $table->string('Noicap');
            $table->date('Ngaybatdaugiamtru');
            $table->date('Ngayketthucgiamtru');
            $table->string('MaNPT');
            $table->string('Ghichu');
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
        Schema::dropIfExists('giam_tru_gia_canhs');
    }
}
