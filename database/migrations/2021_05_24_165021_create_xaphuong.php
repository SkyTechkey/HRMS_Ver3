<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXaphuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_xaphuong', function (Blueprint $table) {
            $table->id();
            $table->string('tenxaphuong');
            $table->unsignedBigInteger('id_loaixaphuong');
            $table->foreign('id_loaixaphuong')->references('id')->on('tbl_loaixaphuong');
            $table->unsignedBigInteger('id_quanhuyen');
            $table->foreign('id_quanhuyen')->references('id')->on('tbl_quanhuyen');
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
        Schema::dropIfExists('tbl_xaphuong');
    }
}
