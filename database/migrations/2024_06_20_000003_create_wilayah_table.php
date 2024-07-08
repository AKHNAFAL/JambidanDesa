<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayahTable extends Migration
{
    public function up()
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah', 255);
            $table->integer('jumlah_penduduk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wilayah');
    }
}
