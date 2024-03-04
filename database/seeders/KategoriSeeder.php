<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'Konsumsi',
                'kategori_nama' => 'Sereal',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'Pakaian',
                'kategori_nama' => 'Sweater'
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'Perabotan',
                'kategori_nama' => 'Microwave'
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'Perawatan',
                'kategori_nama' => 'Sabun cair'
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'Elektronik',
                'kategori_nama' => 'Smartphone'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
