<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhucapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phucap', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_phucap')->nullable();
            $table->string('Sotien')->nullable();
            $table->string('Ghichu')->nullable();
            $table->string('Trangthai')->nullable();
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
        Schema::dropIfExists('tbl_phucap');
    }
}
