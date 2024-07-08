<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesehatanTable extends Migration
{
    public function up()
    {
        Schema::create('kesehatan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_penyakit', 255);
            $table->integer('jumlah_kasus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kesehatan');
    }
}


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
//         Schema::create('kesehatan', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('kesehatan');
//     }
// };
