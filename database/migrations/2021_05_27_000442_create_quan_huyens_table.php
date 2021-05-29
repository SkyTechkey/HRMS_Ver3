<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanHuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quan_huyen', function (Blueprint $table) {
            $table->id();
            $table->string('tenquanhuyen');
            $table->unsignedBigInteger('id_loaiquanhuyen');
            $table->foreign('id_loaiquanhuyen')->references('id')->on('tbl_loai_quan_huyen');
            $table->unsignedBigInteger('id_tinhthanh');
            $table->foreign('id_tinhthanh')->references('id')->on('tbl_loai_tinh_thanh');
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
        Schema::dropIfExists('quan_huyens');
    }
}
