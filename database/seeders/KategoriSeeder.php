<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'kategori_kode' => 'Clothing',
                'kategori_nama' => 'Clothing and Apparel',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'Home Goods',
                'kategori_nama' => 'Home Goods and Décor',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'Beauty',
                'kategori_nama' => 'Beauty and Personal Care',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'Electronic',
                'kategori_nama' => 'Electronics and Appliances',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'Toys',
                'kategori_nama' => 'Toys and Games',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
