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
			$table->unsignedBigInteger('ID_Chinhanh')->nullable();
            $table->string('Trangthai')->nullable();
            $table->string('Ghichu')->nullable();
            $table->timestamps();
		//	$table->foreign('ID_Chinhanh')->references('id')->on('tbl_chinhanh')->onDelete('set null');
      //  $table->foreign('ID_Chinhanh')
      //  ->references('id')->on('tbl_chinhanh')
     //   ->onDelete('cascade');
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
