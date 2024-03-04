<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Dena',
                'penjualan_kode' => 'P1',
                'penjualan_tanggal' => '2024-03-10 10:20:00',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Ale',
                'penjualan_kode' => 'P2',
                'penjualan_tanggal' => '2024-03-10 11:03:00',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Fatik',
                'penjualan_kode' => 'P3',
                'penjualan_tanggal' => '2024-03-10 13:10:00',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Arto',
                'penjualan_kode' => 'P4',
                'penjualan_tanggal' => '2024-03-10 13:12:00',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Caca',
                'penjualan_kode' => 'P5',
                'penjualan_tanggal' => '2024-03-10 13:14:00',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Dom',
                'penjualan_kode' => 'P6',
                'penjualan_tanggal' => '2024-03-10 13:30:00',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Angga',
                'penjualan_kode' => 'P7',
                'penjualan_tanggal' => '2024-03-11 09:40:00',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Rakha',
                'penjualan_kode' => 'P8',
                'penjualan_tanggal' => '2024-03-11 09:41:00',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Syam',
                'penjualan_kode' => 'P9',
                'penjualan_tanggal' => '2024-03-11 10:27:00',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Ren',
                'penjualan_kode' => 'P10',
                'penjualan_tanggal' => '2024-03-11 10:28:00',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
