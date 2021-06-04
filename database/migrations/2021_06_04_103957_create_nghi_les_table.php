<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNghiLesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nghi_le', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_nghile');
            $table->string('Nam');
            $table->date('Ngaynghi');
            $table->string('Loai');
            $table->string('Heso');
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
        Schema::dropIfExists('nghi_les');
    }
}
