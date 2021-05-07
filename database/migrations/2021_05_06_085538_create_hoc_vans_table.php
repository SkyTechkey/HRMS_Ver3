<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocVansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trinh_do_hoc_van', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pho_thong');
            $table->string('cao_dang');
            $table->string('dai_hoc');
            $table->string('cao_hoc');
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
        Schema::dropIfExists('hoc_vans');
    }
}
