<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTable extends Migration
{
    public function up()
    {
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->decimal('anggaran_desa', 15, 2);
            $table->decimal('anggaran_terpakai', 15, 2);
            $table->decimal('sisa_anggaran', 15, 2);
            $table->decimal('persentase_pemanfaatan', 5, 2)->storedAs('anggaran_terpakai / anggaran_desa * 100');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('keuangan');
    }
}

