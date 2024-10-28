<?php

namespace Database\Factories;

use App\Models\Soal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soal>
 */
class SoalFactory extends Factory
{
    protected $model = Soal::class;

    public function definition()
    {
        // Daftar opsi jawaban dengan format A., B., C., D., dan E.
        $options = [
            'A' => 'A. ' . $this->faker->sentence(5),
            'B' => 'B. ' . $this->faker->sentence(5),
            'C' => 'C. ' . $this->faker->sentence(5),
            'D' => 'D. ' . $this->faker->sentence(5),
            'E' => 'E. ' . $this->faker->sentence(5),
        ];

        // Pilih salah satu opsi sebagai jawaban yang benar
        $correctAnswerKey = array_rand($options);
        $correctAnswer = $options[$correctAnswerKey];

        return [
            'paket_soal_id' => $this->faker->numberBetween(1, 3), // Sesuaikan dengan jumlah paket soal yang ada
            'soal' => 'Ini adalah contoh soal matematika: ' . $this->faker->sentence(),
            'pil_a' => $options['A'],
            'skor_a' => $correctAnswerKey === 'A' ? 1 : 0,
            'pil_b' => $options['B'],
            'skor_b' => $correctAnswerKey === 'B' ? 1 : 0,
            'pil_c' => $options['C'],
            'skor_c' => $correctAnswerKey === 'C' ? 1 : 0,
            'pil_d' => $options['D'],
            'skor_d' => $correctAnswerKey === 'D' ? 1 : 0,
            'pil_e' => $options['E'],
            'skor_e' => $correctAnswerKey === 'E' ? 1 : 0,
            'jawaban' => $correctAnswerKey,
            'pembahasan' => 'Ini adalah pembahasan untuk soal tersebut.',
            'gambar_pembahasan' => null,
            'bab' => 'Bab Matematika',
            'video_penjelasan' => null,
        ];
    }
}
