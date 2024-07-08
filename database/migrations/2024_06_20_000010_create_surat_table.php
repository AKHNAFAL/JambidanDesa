<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_surat', [
                'Surat Keterangan Domisili', 
                'Surat Keterangan Kelahiran', 
                'Surat Keterangan Tidak Mampu', 
                'Surat Keterangan Usaha', 
                'Surat Keterangan Kematian', 
                'Surat Keterangan Jual Beli Tanah', 
                'Surat Keterangan Jalan', 
                'Surat Keterangan Cerai Hidup/Cerai Mati', 
                'Surat Keterangan WNI', 
                'Surat Keterangan Disabilitas', 
                'Surat Keterangan Ahli Waris'
            ]);
            $table->date('tanggal_masuk');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat');
    }
}
