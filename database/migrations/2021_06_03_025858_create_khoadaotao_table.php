<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoadaotaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khoadaotao', function (Blueprint $table) {
            $table->id();
            $table->string('Ten_khoadaotao')->nullable();
            $table->string('Kynang_khoadaotao')->nullable();
            $table->string('Quydinh_khoadaotao')->nullable();
            $table->string('Hinhthuc_khoadaotao')->nullable();
            $table->string('Doituong_khoadaotao')->nullable();
            $table->string('ID_nhanvien')->nullable();
            $table->string('ID_phongban')->nullable();
            $table->string('ID_chucvu')->nullable();
            $table->string('Sobuoi_khoadatao')->nullable();
            $table->string('Noidung')->nullable();
            $table->string('Muctieu')->nullable();
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
        Schema::dropIfExists('tbl_khoadaotao');
    }
}
