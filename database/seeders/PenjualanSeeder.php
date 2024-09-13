<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Penjualan 1
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Alex',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => '2024-08-01 09:00:00',
            ],
            // Penjualan 2
            [
                'penjualan_id' => 2,
                'user_id' => 1,
                'pembeli' => 'Dani',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => '2024-08-02 10:00:00',
            ],
            // Penjualan 3
            [
                'penjualan_id' => 3,
                'user_id' => 2,
                'pembeli' => 'Hanum',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => '2024-08-03 11:00:00',
            ],
            // Penjualan 4
            [
                'penjualan_id' => 4,
                'user_id' => 2,
                'pembeli' => 'Kiki',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => '2024-08-04 12:00:00',
            ],
            // Penjualan 5
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Lina',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => '2024-08-05 13:00:00',
            ],
            // Penjualan 6
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Maya',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => '2024-08-06 14:00:00',
            ],
            // Penjualan 7
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Nina',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => '2024-08-07 15:00:00',
            ],
            // Penjualan 8
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Omar',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => '2024-08-08 16:00:00',
            ],
            // Penjualan 9
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Putu',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => '2024-08-09 17:00:00',
            ],
            // Penjualan 10
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Rina',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => '2024-08-10 18:00:00',
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
