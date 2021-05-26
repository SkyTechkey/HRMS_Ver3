<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinhthanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tinhthanh', function (Blueprint $table) {
            $table->id();
            $table->string('tentinhthanh');
            $table->unsignedBigInteger('id_loaitinhthanh');
            $table->foreign('id_loaitinhthanh')->references('id')->on('tbl_loaitinhthanh');
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
        Schema::dropIfExists('tbl_tinhthanh');
    }
}
