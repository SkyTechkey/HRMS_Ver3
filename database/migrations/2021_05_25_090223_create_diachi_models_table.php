<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiachiModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diachi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tinhthanh');
            $table->foreign('id_tinhthanh')->references('id')->on('tbl_tinhthanh');
            $table->unsignedBigInteger('id_quanhuyen');
            $table->foreign('id_quanhuyen')->references('id')->on('tbl_quanhuyen');
            $table->unsignedBigInteger('id_xaphuong');
            $table->foreign('id_xaphuong')->references('id')->on('tbl_xaphuong');
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
        Schema::dropIfExists('tbl_diachi');
    }
}
