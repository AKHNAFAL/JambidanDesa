<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected $fillable = [
        'nama_proyek',
        'deskripsi',
        'status',
        'persentase_penyelesaian',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
