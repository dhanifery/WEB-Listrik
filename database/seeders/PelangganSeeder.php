<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'tarifListrik_id'       => '1',
            'pelanggan_id'          => 'SHNGRC2024',
            'nama_pelanggan'        => 'Shania Gracia',
            'alamat'                => 'Bekasi',
        ]);
    }
}
