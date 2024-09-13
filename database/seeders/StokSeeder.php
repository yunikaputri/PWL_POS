<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            // Stok barang dari Supplier A
            [
                'stok_id' => 1,
                'supplier_id' => 1,
                'barang_id' => 1, // Coca Cola
                'user_id' => 1,
                'stok_tanggal' => $now,
                'stok_jumlah' => 50,
            ],
            [
                'stok_id' => 2,
                'supplier_id' => 1,
                'barang_id' => 2, // Indomie Goreng
                'user_id' => 1,
                'stok_tanggal' => $now,
                'stok_jumlah' => 150,
            ],
            [
                'stok_id' => 3,
                'supplier_id' => 1,
                'barang_id' => 3, // Chitato
                'user_id' => 1,
                'stok_tanggal' => $now,
                'stok_jumlah' => 80,
            ],
            [
                'stok_id' => 4,
                'supplier_id' => 1,
                'barang_id' => 4, // Sprite
                'user_id' => 1,
                'stok_tanggal' => $now,
                'stok_jumlah' => 60,
            ],
            [
                'stok_id' => 5,
                'supplier_id' => 1,
                'barang_id' => 5, // Mie Sedaap
                'user_id' => 1,
                'stok_tanggal' => $now,
                'stok_jumlah' => 100,
            ],

            // Stok barang dari Supplier B
            [
                'stok_id' => 6,
                'supplier_id' => 2,
                'barang_id' => 6, // Pepsi
                'user_id' => 2,
                'stok_tanggal' => $now,
                'stok_jumlah' => 70,
            ],
            [
                'stok_id' => 7,
                'supplier_id' => 2,
                'barang_id' => 7, // Fanta
                'user_id' => 2,
                'stok_tanggal' => $now,
                'stok_jumlah' => 65,
            ],
            [
                'stok_id' => 8,
                'supplier_id' => 2,
                'barang_id' => 8, // Kopiko
                'user_id' => 2,
                'stok_tanggal' => $now,
                'stok_jumlah' => 90,
            ],
            [
                'stok_id' => 9,
                'supplier_id' => 2,
                'barang_id' => 9, // Supermi
                'user_id' => 2,
                'stok_tanggal' => $now,
                'stok_jumlah' => 110,
            ],
            [
                'stok_id' => 10,
                'supplier_id' => 2,
                'barang_id' => 10, // Tango
                'user_id' => 2,
                'stok_tanggal' => $now,
                'stok_jumlah' => 75,
            ],

            // Stok barang dari Supplier C
            [
                'stok_id' => 11,
                'supplier_id' => 3,
                'barang_id' => 11, // Milo
                'user_id' => 3,
                'stok_tanggal' => $now,
                'stok_jumlah' => 85,
            ],
            [
                'stok_id' => 12,
                'supplier_id' => 3,
                'barang_id' => 12, // Bimoli
                'user_id' => 3,
                'stok_tanggal' => $now,
                'stok_jumlah' => 95,
            ],
            [
                'stok_id' => 13,
                'supplier_id' => 3,
                'barang_id' => 13, // Pringles
                'user_id' => 3,
                'stok_tanggal' => $now,
                'stok_jumlah' => 70,
            ],
            [
                'stok_id' => 14,
                'supplier_id' => 3,
                'barang_id' => 14, // Lays
                'user_id' => 3,
                'stok_tanggal' => $now,
                'stok_jumlah' => 85,
            ],
            [
                'stok_id' => 15,
                'supplier_id' => 3,
                'barang_id' => 15, // Beras
                'user_id' => 3,
                'stok_tanggal' => $now,
                'stok_jumlah' => 50,
            ],
        ];

        DB::table('t_stok')->insert($data);
    }
}
