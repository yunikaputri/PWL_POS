<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_kode' => 'S001',
                'supplier_nama' => 'Supplier A',
                'supplier_alamat' => 'J1. Jakarta No. 123',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'S002',
                'supplier_nama' => 'Supplier B',
                'supplier_alamat' => 'J1. Bandung No. 456',
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'S003',
                'supplier_nama' => 'Supplier C',
                'supplier_alamat' => 'J1. Surabaya No. 789',
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
