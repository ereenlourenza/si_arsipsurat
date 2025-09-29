<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArsipSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nomor_surat' => '2022/PD3/TU/001',
                'kategori_id' => 2, // id kategori "Pengumuman"
                'judul'       => 'Nota Dinas WFH',
                'file_pdf'    => 'nota_dinas_wfh.pdf',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'nomor_surat' => '2022/PD2/TU/022',
                'kategori_id' => 1, // id kategori "Undangan"
                'judul'       => 'Undangan Halal Bi Halal',
                'file_pdf'    => 'undangan_halal_bihalal.pdf',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];
        DB::table('arsip_surat')->insert($data);
    }
}
