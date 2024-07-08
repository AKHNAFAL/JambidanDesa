<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    protected $table = 'kependudukan';

    protected $fillable = [
        'NIK', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'umur',
        'wilayah_id', 'agama', 'status_pendidikan', 'status_ekonomi', 'pekerjaan',
    ];

    
}
