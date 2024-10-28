<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soal::factory()
            ->count(50)
            ->create(['paket_soal_id' => 1]);

        Soal::factory()
            ->count(50)
            ->create(['paket_soal_id' => 2]);

        Soal::factory()
            ->count(50)
            ->create(['paket_soal_id' => 3]);
    }
}
