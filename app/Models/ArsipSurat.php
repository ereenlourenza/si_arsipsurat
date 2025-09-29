<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'arsip_surat';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'file_pdf',
    ];

    // Relasi: satu arsip surat milik satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }
}
