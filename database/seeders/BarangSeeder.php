<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [
                [
                    'barang_id' => 1,
                    'kategori_id' => 1,
                    'barang_kode' => '1_1',
                    'barang_nama' => 'Cruncy Bowl',
                    'harga_beli' => 17000,
                    'harga_jual' => 20000
                ],
                [
                    'barang_id' => 2,
                    'kategori_id' => 1,
                    'barang_kode' => '1_2',
                    'barang_nama' => 'Great cereal',
                    'harga_beli' => 19000,
                    'harga_jual' => 24000
                ],
                [
                    'barang_id' => 3,
                    'kategori_id' => 2,
                    'barang_kode' => '2_1',
                    'barang_nama' => 'Himalayas',
                    'harga_beli' => 50000,
                    'harga_jual' => 65000
                ],
                [
                    'barang_id' => 4,
                    'kategori_id' => 2,
                    'barang_kode' => '2_2',
                    'barang_nama' => 'RGold',
                    'harga_beli' => 80000,
                    'harga_jual' => 110000
                ],
                [
                    'barang_id' => 5,
                    'kategori_id' => 3,
                    'barang_kode' => '3_1',
                    'barang_nama' => 'Polygon',
                    'harga_beli' => 2000000,
                    'harga_jual' => 2300000
                ],
                [
                    'barang_id' => 6,
                    'kategori_id' => 3,
                    'barang_kode' => '3_2',
                    'barang_nama' => 'Heat',
                    'harga_beli' => 1800000,
                    'harga_jual' => 2000000
                ],
                [
                    'barang_id' => 7,
                    'kategori_id' => 4,
                    'barang_kode' => '4_1',
                    'barang_nama' => 'OneGuard',
                    'harga_beli' => 12000,
                    'harga_jual' => 17000
                ],
                [
                    'barang_id' => 8,
                    'kategori_id' => 4,
                    'barang_kode' => '4_2',
                    'barang_nama' => 'ExtraLife',
                    'harga_beli' => 10000,
                    'harga_jual' => 15000
                ],
                [
                    'barang_id' => 9,
                    'kategori_id' => 5,
                    'barang_kode' => '5_1',
                    'barang_nama' => 'RealYou 12A',
                    'harga_beli' => 4000000,
                    'harga_jual' => 4300000
                ],
                [
                    'barang_id' => 10,
                    'kategori_id' => 5,
                    'barang_kode' => '5_2',
                    'barang_nama' => 'Xpand Z12',
                    'harga_beli' => 7000000,
                    'harga_jual' => 7500000
                ]
            ];
        DB::table('m_barang')->insert($data);
    }
}
