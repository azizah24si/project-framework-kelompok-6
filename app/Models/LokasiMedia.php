<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi_id',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
        'media_type',
    ];

    public function lokasi()
    {
        return $this->belongsTo(LokasiProyek::class, 'lokasi_id', 'lokasi_id');
    }
}
