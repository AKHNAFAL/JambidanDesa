<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_komentar extends Model
{
    use HasFactory;
    protected $table = 'post_komentar';
    protected $fillable = ['user_id', 'komentar', 'tanggal_post'];  // Specify fillable fields
}
