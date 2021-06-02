<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_ho_so_bang_cap', function (Blueprint $table) {
            $table->string('Dinhkem')->nulllable()->after('Ghichu');
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
