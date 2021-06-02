<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hoso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ID_username')->nullable();
            $table->unsignedBigInteger('ID_loaihoso')->nullable();
            $table->string('Dinhkem')->nullable();
            $table->string('Trangthai')->nullable();
            $table->string('Ghichu')->nullable();
            $table->timestamps();
            $table->foreign('ID_username')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_loaihoso')->references('id')->on('tbl_loaihoso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hoso');
    }
}
