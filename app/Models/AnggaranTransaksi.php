<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranTransaksi extends Model
{
    use HasFactory;

    protected $table = 'anggaran_transaksi';

    protected $fillable = [
        'anggaran_tahun',
        'tanggal',
        'jenis_transaksi',
        'keterangan',
        'jumlah',
        'jenis_akun',
        'created_at',
        'updated_at',
    ];
}
