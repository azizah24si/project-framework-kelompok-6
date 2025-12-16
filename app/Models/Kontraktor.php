<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraktor extends Model
{
    use HasFactory;

    protected $table = 'kontraktor';
    protected $primaryKey = 'kontraktor_id';

    protected $fillable = [
        'proyek_id',
        'nama',
        'penanggung_jawab',
        'kontak',
        'alamat',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}


