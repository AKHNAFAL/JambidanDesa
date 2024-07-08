<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranTahunanTable extends Migration
{
    public function up()
    {
        // Periksa apakah tabel sudah ada
        if (!Schema::hasTable('anggaran_tahunan')) {
            Schema::create('anggaran_tahunan', function (Blueprint $table) {
                $table->id();
                $table->year('tahun');
                $table->decimal('anggaran_desa', 15, 2);
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('anggaran_tahunan');
    }
}


