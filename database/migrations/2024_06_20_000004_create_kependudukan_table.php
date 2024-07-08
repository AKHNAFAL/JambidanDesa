<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKependudukanTable extends Migration
{
    public function up()
    {
        Schema::create('kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('NIK', 16)->unique();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->foreignId('wilayah_id')->constrained('wilayah');
            $table->enum('agama', ['Islam', 'Kristen']);
            $table->enum('status_pendidikan', ['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Magister', 'Doktor']);
            $table->enum('status_ekonomi', ['Miskin', 'Rentan', 'Menengah Bawah', 'Menengah', 'Atas']);
            $table->string('pekerjaan', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kependudukan');
    }
}

// Template Default Laravel
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('kependudukan', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('kependudukan');
//     }
// };