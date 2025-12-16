<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'progres_id',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
    ];

    public function progres()
    {
        return $this->belongsTo(ProgresProyek::class, 'progres_id', 'progres_id');
    }
}
