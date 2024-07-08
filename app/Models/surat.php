<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    use HasFactory;

    protected $table ='surat';

    protected $fillable = [
        'jenis_surat',
        'tanggal_masuk',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
