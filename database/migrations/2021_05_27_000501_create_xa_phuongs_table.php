<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXaPhuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_xa_phuong', function (Blueprint $table) {
            $table->id();
            $table->string('tenxaphuong');
            $table->unsignedBigInteger('id_loaixaphuong');
            $table->foreign('id_loaixaphuong')->references('id')->on('tbl_loai_xa_phuong');
            $table->unsignedBigInteger('id_quanhuyen');
            $table->foreign('id_quanhuyen')->references('id')->on('tbl_quan_huyen');
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
        Schema::dropIfExists('xa_phuongs');
    }
}
