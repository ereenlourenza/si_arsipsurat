<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'nama_kategori' => 'Undangan',
                'keterangan' => 'Undangan rapat, koordinasi, dsb.',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Pengumuman',
                'keterangan' => 'Surat-surat yang terkait dengan pengumuman',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Nota Dinas',
                'keterangan' => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Pemberitahuan',
                'keterangan' => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ];
        DB::table('kategori_surat')->insert($data);
    }
}
