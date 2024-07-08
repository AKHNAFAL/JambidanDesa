<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $primaryKey = 'id';

    protected $fillable = [
       'document_name', 'document_type', 'upload_date', 'file_path', 'status'
    ];

    public $timestamps = false; // Disable timestamps
}
