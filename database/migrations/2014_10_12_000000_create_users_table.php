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
            $table->string('nik',16)->nullable();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('notelp')->nullable();
            $table->enum('level',['masyarakat','petugas','admin'])->default('masyarakat');
            $table->rememberToken();
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
