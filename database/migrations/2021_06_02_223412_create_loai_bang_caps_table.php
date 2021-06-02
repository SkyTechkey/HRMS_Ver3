<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiBangCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_loai_bang_cap', function (Blueprint $table) {
            $table->id();
            $table->String('Ten_bangcap')->nulllabte();
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
        Schema::dropIfExists('loai_bang_caps');
    }
}
