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
            $table->String('iduser');
            $table->string('username')->unique();
            $table->string('password');
            $table->Integer('role');
            $table->string('tengv');
            $table->string('ngaysinh');
            $table->string('idbomon');
            $table->string('chucvu');
            $table->string('sdt');
            $table->string('email');
            $table->Integer('status');
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
        Schema::dropIfExists('users');
    }
}
