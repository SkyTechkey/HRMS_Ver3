<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chinhanh', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_chinhanh')->nullable();
            $table->string('Ten_nguoidungdau')->nullable();
            $table->string('Chucvu')->nullable();
            $table->string('Diachi')->nullable();
            $table->string('Sodienthoai')->nullable();
            $table->string('Email')->nullable();
            $table->string('Trangthai')->nullable();
            $table->string('Ghichu')->nullable();
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
        Schema::dropIfExists('tbl_chinhanh');
    }
}
