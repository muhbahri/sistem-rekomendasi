<?php

namespace Database\Seeders;

use App\Models\UserAnswer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAnswerSeeder extends Seeder {
    public function run(): void {
        UserAnswer::create([
            'user_id' => 1,
            'kriteria_id' => 1,
            'score' => 4,
        ]);
    }
}
