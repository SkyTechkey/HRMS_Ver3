<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoilamviecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_noi_lam_viec', function (Blueprint $table) {
            $table->id();
            $table->string('Tenchinhanh');
            $table->unsignedBigInteger('Id_Diachi');
            $table->foreign('Id_Diachi')->references('id')->on('tbl_dia_danh');
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
        Schema::dropIfExists('noilamviecs');
    }
}
