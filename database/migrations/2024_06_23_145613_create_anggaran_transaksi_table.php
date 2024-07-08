<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranTransaksiTable extends Migration
{
    public function up()
    {
        // Periksa apakah tabel sudah ada
        if (!Schema::hasTable('anggaran_transaksi')) {
            Schema::create('anggaran_transaksi', function (Blueprint $table) {
                $table->id();
                $table->foreignId('anggaran_tahunan_id')->constrained('anggaran_tahunan');
                $table->date('tanggal');
                $table->enum('jenis_transaksi', ['pemasukan', 'pengeluaran']);
                $table->string('keterangan');
                $table->decimal('jumlah', 15, 2);
                $table->string('jenis_akun');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('anggaran_transaksi');
    }
}

