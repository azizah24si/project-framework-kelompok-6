<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahapanProyek extends Model
{
    use HasFactory;

    protected $table = 'tahapan_proyek';
    protected $primaryKey = 'tahap_id';

    protected $fillable = [
        'proyek_id',
        'nama_tahap',
        'target_persen',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }
}
