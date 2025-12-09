<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Proyek extends Model
{
    protected $table      = 'proyek';
    protected $primaryKey = 'proyek_id';

    protected $fillable   = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
    ];

    protected $appends = [
        'cover_photo_url',
    ];

    public function files()
    {
        return $this->hasMany(ProyekFile::class, 'proyek_id', 'proyek_id');
    }

    public function getCoverPhotoUrlAttribute(): string
    {
        $files = $this->relationLoaded('files') ? $this->files : $this->files()->get();

        $imageFile = $files->first(function (ProyekFile $file) {
            if (!empty($file->mime_type)) {
                return Str::startsWith($file->mime_type, 'image/');
            }

            $extension = strtolower(pathinfo($file->original_name, PATHINFO_EXTENSION));

            return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true);
        });

        if ($imageFile && Storage::disk('public')->exists($imageFile->file_path)) {
            return Storage::url($imageFile->file_path);
        }

        $initials = urlencode($this->nama_proyek ?? 'Proyek');

        return "https://ui-avatars.com/api/?size=128&rounded=true&name={$initials}&background=0F4C81&color=fff";
    }
}
