<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDGs extends Model
{
    use HasFactory;

    protected $table = 'sdgs_desa';

    protected $fillable = [
        'tahun',
        'target_sdgs',
        'indikator',
        'nilai_indikator',
        'created_at',
        'updated_at',
    ];
}
