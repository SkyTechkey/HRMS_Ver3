<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHoSoBangCap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_ho_so_bang_cap', function (Blueprint $table) {
            $table->string('Noitotnghiep')->nulllable()->after('ID_TrinhDoChuyenMon');
            $table->string('Namtotnghiep')->nulllabel();
            $table->string('Trangthai')->nulllabel();
            $table->string('Ghichu')->nulllabel();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_ho_so_bang_cap', function (Blueprint $table) {
            //
        });
    }
}
