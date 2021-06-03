<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXaphuongTable extends Migration
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
            $table->string('Ten_xaphuong')->nullable();
            $table->unsignedBigInteger('ID_quanhuyen')->nullable();
            
            $table->string('Trangthai')->nullable();
            $table->string('Ghichu')->nullable();
            $table->timestamps();
            $table->foreign('ID_quanhuyen')->references('id')->on('tbl_quanhuyen');
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
