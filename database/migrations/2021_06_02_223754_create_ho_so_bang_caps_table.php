<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoSoBangCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_so_bang_caps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Username');
            $table->foreign('ID_Username')->references('id')->on('users');
            $table->unsignedBigInteger('ID_Loaibangcap');
            $table->foreign('ID_Loaibangcap')->references('id')->on('tbl_loai_bang_cap');
            $table->unsignedBigInteger('ID_Trinhdochuyenmon');
            $table->foreign('ID_Trinhdochuyenmon')->references('id')->on('tbl_loai_trinh_do_chuyen_mon');
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
        Schema::dropIfExists('ho_so_bang_caps');
    }
}
