<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiTrinhDoChuyenMonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_loai_trinh_do_chuyen_mon', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_Trinhdochuyenmon')->nulllable();
            $table->string('Trangthai')->nulllable();
            $table->string('Ghichu')->nulllable();
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
        Schema::dropIfExists('loai_trinh_do_chuyen_mons');
    }
}
