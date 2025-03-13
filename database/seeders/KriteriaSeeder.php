<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run(): void
{
    $kriteria = [
        ['nama' => 'Gaji', 'jenis' => 'benefit', 'bobot' => 0.3],
        ['nama' => 'Biaya Hidup', 'jenis' => 'cost', 'bobot' => 0.2],
        ['nama' => 'Kesempatan Karier', 'jenis' => 'benefit', 'bobot' => 0.15],
        ['nama' => 'Budaya & Kenyamanan', 'jenis' => 'benefit', 'bobot' => 0.1],
        ['nama' => 'Keamanan', 'jenis' => 'benefit', 'bobot' => 0.15],
        ['nama' => 'Proses Migrasi', 'jenis' => 'cost', 'bobot' => 0.1],
    ];

    foreach ($kriteria as $item) {
        \App\Models\Kriteria::create($item);
    }
}

}
