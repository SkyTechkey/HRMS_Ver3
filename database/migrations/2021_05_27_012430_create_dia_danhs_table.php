<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaDanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dia_danh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tinhthanh');
            $table->foreign('id_tinhthanh')->references('id')->on('tbl_tinh_thanh');
            $table->unsignedBigInteger('id_quanhuyen');
            $table->foreign('id_quanhuyen')->references('id')->on('tbl_quan_huyen');
            $table->unsignedBigInteger('id_xaphuong');
            $table->foreign('id_xaphuong')->references('id')->on('tbl_xa_phuong');
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
        Schema::dropIfExists('dia_danhs');
    }
}
