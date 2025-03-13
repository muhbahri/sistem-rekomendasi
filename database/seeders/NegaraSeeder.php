<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegaraSeeder extends Seeder
{
    public function run(): void
{
    $negara = ['Korea', 'Jepang', 'Taiwan'];

    foreach ($negara as $n) {
        \App\Models\Negara::create(['nama' => $n]);
    }
}

}
