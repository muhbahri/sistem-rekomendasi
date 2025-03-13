<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    public function run(): void
    {
        $penilaian = [
            ['negara_id' => 1, 'kriteria_id' => 1, 'nilai' => 80], // Korea - Gaji
            ['negara_id' => 1, 'kriteria_id' => 2, 'nilai' => 60], // Korea - Biaya Hidup
            ['negara_id' => 2, 'kriteria_id' => 1, 'nilai' => 75], // Jepang - Gaji
            ['negara_id' => 2, 'kriteria_id' => 2, 'nilai' => 65], // Jepang - Biaya Hidup
            ['negara_id' => 3, 'kriteria_id' => 1, 'nilai' => 70], // Taiwan - Gaji
            ['negara_id' => 3, 'kriteria_id' => 2, 'nilai' => 50], // Taiwan - Biaya Hidup
        ];

        foreach ($penilaian as $item) {
            Penilaian::create($item);
        }
    }
}
