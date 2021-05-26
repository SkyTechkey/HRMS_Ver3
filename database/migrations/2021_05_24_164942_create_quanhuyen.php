<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanhuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quanhuyen', function (Blueprint $table) {
            $table->id();
            $table->string('tenquanhuyen');
            $table->unsignedBigInteger('id_loaiquanhuyen');
            $table->foreign('id_loaiquanhuyen')->references('id')->on('tbl_loaitinhthanh');
            $table->unsignedBigInteger('id_tinhthanh');
            $table->foreign('id_tinhthanh')->references('id')->on('tbl_loaitinhthanh');
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
        Schema::dropIfExists('tbl_quanhuyen');
    }
}
