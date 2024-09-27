<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama' => 'Produk 1',
                'jenis' => 'Elektronik',
                'deskripsi' => 'Ini deskripsi produk 1',
                'harga_jual' => '1000000.00',
                'harga_beli' => '800000.00',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Produk 2',
                'jenis' => 'Pakaian',
                'deskripsi' => 'Ini deskripsi produk 2',
                'harga_jual' => '1030000.00',
                'harga_beli' => '950000.00',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Produk 3',
                'jenis' => 'Furnitur',
                'deskripsi' => 'Ini deskripsi produk 3',
                'harga_jual' => '150000.00',
                'harga_beli' => '100000.00',
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
