<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phongban', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_phongban')->nullable();
            $table->string('Chinhanh')->nullable();
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
        Schema::dropIfExists('tbl_phongban');
    }
}
