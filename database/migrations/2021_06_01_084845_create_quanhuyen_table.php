<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanhuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quanhuyen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ten_quanhuyen')->nullable();
            $table->unsignedBigInteger('ID_tinhthanhpho')->nullable();
            $table->string('Trangthai')->nullable();
            $table->string('Ghichu')->nullable();
            $table->timestamps();
            $table->foreign('ID_tinhthanhpho')->references('id')->on('tbl_tinhthanhpho')->onDelete('cascade');;
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
