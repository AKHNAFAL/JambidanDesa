<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    use HasFactory;

    
    protected $table = 'broadcasts';

    protected $primaryKey = 'id';

    protected $fillable = [
       'isi_broadcast', 'created_at', 'updated_at', 'status'
    ];
}
