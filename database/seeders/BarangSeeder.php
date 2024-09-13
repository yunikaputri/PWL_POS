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
            // Barang untuk Supplier A
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'B001',
                'barang_nama' => 'Coca Cola',
                'harga_beli' => 6000,
                'harga_jual' => 7500,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'B002',
                'barang_nama' => 'Sprite',
                'harga_beli' => 6200,
                'harga_jual' => 7700,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'B003',
                'barang_nama' => 'Indomie Goreng',
                'harga_beli' => 2500,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'B004',
                'barang_nama' => 'Mie Sedaap',
                'harga_beli' => 2600,
                'harga_jual' => 3100,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'B005',
                'barang_nama' => 'Chitato',
                'harga_beli' => 4000,
                'harga_jual' => 5000,
            ],

            // Barang untuk Supplier B
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'B006',
                'barang_nama' => 'Pepsi',
                'harga_beli' => 6200,
                'harga_jual' => 7700,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 1,
                'barang_kode' => 'B007',
                'barang_nama' => 'Fanta',
                'harga_beli' => 6300,
                'harga_jual' => 7800,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 2,
                'barang_kode' => 'B008',
                'barang_nama' => 'Kopiko',
                'harga_beli' => 2700,
                'harga_jual' => 3200,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 2,
                'barang_kode' => 'B009',
                'barang_nama' => 'Supermi',
                'harga_beli' => 2800,
                'harga_jual' => 3300,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 3,
                'barang_kode' => 'B010',
                'barang_nama' => 'Tango',
                'harga_beli' => 4100,
                'harga_jual' => 5100,
            ],

            // Barang untuk Supplier C
            [
                'barang_id' => 11,
                'kategori_id' => 1,
                'barang_kode' => 'B011',
                'barang_nama' => 'Milo',
                'harga_beli' => 6400,
                'harga_jual' => 7900,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 2,
                'barang_kode' => 'B012',
                'barang_nama' => 'Bimoli',
                'harga_beli' => 2900,
                'harga_jual' => 3400,
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 3,
                'barang_kode' => 'B013',
                'barang_nama' => 'Pringles',
                'harga_beli' => 4200,
                'harga_jual' => 5200,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 3,
                'barang_kode' => 'B014',
                'barang_nama' => 'Lays',
                'harga_beli' => 4300,
                'harga_jual' => 5300,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 4,
                'barang_kode' => 'B015',
                'barang_nama' => 'Beras',
                'harga_beli' => 45000,
                'harga_jual' => 50000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
