<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('nama_lengkap', 100)->nullable();
            $table->string('NIK', 16)->unique()->nullable();
            $table->enum('role', ['user', 'admin', 'super_admin']);
            $table->string('status', 50)->default('aktif');
            $table->timestamps();

            $table->foreign('NIK')->references('NIK')->on('kependudukan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
