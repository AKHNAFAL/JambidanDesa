<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('pengguna');
            $table->text('komentar');
            $table->date('tanggal_post');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
