<?php

namespace Database\Seeders;

use App\Models\TarifListrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TarifListrik::create([
            'kdTarif'           => 'R-1/TR',
            'beban'             => '900',
            'tarif_perkwh'      => '1352',
        ]);
    }
}
