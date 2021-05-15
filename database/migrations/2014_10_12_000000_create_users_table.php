<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
	        $table->string('phone');
            $table->string('role')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('tongiao')->nullable();
            $table->unsignedBigInteger('quoctich')->nullable();
            $table->unsignedBigInteger('ngoaingu')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();

            $table->foreign('tongiao')->references('id')->on('tbl_tongiao');
            $table->foreign('quoctich')->references('id')->on('tbl_quoctich');
            $table->foreign('ngoaingu')->references('id')->on('tbl_ngoaingu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
