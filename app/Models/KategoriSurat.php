<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;

    // Nama tabel (opsional, kalau tidak sesuai konvensi)
    protected $table = 'kategori_surat';
    protected $primaryKey = 'id';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    // Relasi: satu kategori punya banyak arsip
    public function arsip()
    {
        return $this->hasMany(ArsipSurat::class, 'kategori_id');
    }
}
