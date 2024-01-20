<?php

namespace Database\Seeders;

use App\Models\Tagihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tagihan::create([
            'pelanggan_id'          =>  1,
            'tahun_tagihan'         => 3000000,
            'bulan_tagihan'         => 200000,
            'pemakaian'             => 300,
        ]);
    }
}
