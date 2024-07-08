<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesehatan extends Model
{
    use HasFactory;

    protected $table = 'kesehatan';

    protected $fillable = [
        'jenis_penyakit',
        'jumlah_kasus',
        'created_at',
        'updated_at',
    ];
}
