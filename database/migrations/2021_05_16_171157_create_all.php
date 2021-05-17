<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_roles', function (Blueprint $table) {
            $table->id();
            $table->string('Vaitro');
            $table->timestamps();
        });

        Schema::create('tbl_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('Chophep');
            $table->timestamps();
        });

        Schema::create('tbl_role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('tbl_roles')
                ->onDelete('cascade');
        });

        Schema::create('tbl_permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permission_id')->references('id')->on('tbl_permissions')
                ->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('tbl_roles')
                ->onDelete('cascade');
        });

        Schema::create('tbl_nganhang_user', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_Nganhang');
            $table->unsignedBigInteger('user_id');

            $table->foreign('ID_Nganhang')->references('id')->on('tbl_nganhang')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_roles');
    }
}
