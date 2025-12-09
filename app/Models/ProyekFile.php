<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyekFile extends Model
{
    protected $fillable = [
        'proyek_id',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}

