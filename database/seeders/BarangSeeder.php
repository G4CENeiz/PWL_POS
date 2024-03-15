<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'men shirt',
                'barang_nama' => 'Men Shirt',
                'harga_beli' => 250000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'women shoe',
                'barang_nama' => 'Women Shoe',
                'harga_beli' => 300000,
                'harga_jual' => 200000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'comforter',
                'barang_nama' => 'Queen-sized Comforter Set',
                'harga_beli' => 600000,
                'harga_jual' => 250000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'pillows',
                'barang_nama' => 'Decorative Throw Pillows',
                'harga_beli' => 200000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'moist',
                'barang_nama' => 'Facial Moisturizer',
                'harga_beli' => 85000,
                'harga_jual' => 65000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'mascara',
                'barang_nama' => 'Mascara',
                'harga_beli' => 80000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'tv',
                'barang_nama' => 'Smart TV',
                'harga_beli' => 8000000,
                'harga_jual' => 6500000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'laptop',
                'barang_nama' => 'Laptop',
                'harga_beli' => 7000000,
                'harga_jual' => 5500000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'lego',
                'barang_nama' => 'LEGO Batman',
                'harga_beli' => 3000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'monopoly',
                'barang_nama' => 'Monopoly',
                'harga_beli' => 335000,
                'harga_jual' => 185000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
