<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TestQuestion;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        TestQuestion::query()->delete();

        $questions = [
            [
                'question' => 'Jika 3x + 5 = 20, maka nilai x adalah …',
                'option_a' => '3',
                'option_b' => '4',
                'option_c' => '5',
                'option_d' => '6',
                'correct_answer' => 'C',
                'weight' => 10,
            ],
            [
                'question' => 'Manakah yang termasuk perangkat lunak sistem operasi?',
                'option_a' => 'Microsoft Word',
                'option_b' => 'Windows',
                'option_c' => 'Google Chrome',
                'option_d' => 'Photoshop',
                'correct_answer' => 'B',
                'weight' => 10,
            ],
            [
                'question' => 'Ibukota negara Indonesia adalah …',
                'option_a' => 'Bandung',
                'option_b' => 'Surabaya',
                'option_c' => 'Jakarta',
                'option_d' => 'Medan',
                'correct_answer' => 'C',
                'weight' => 10,
            ],
            [
                'question' => 'Jika semua mahasiswa rajin belajar dan Andi adalah mahasiswa, maka …',
                'option_a' => 'Andi tidak rajin',
                'option_b' => 'Andi rajin belajar',
                'option_c' => 'Andi bukan mahasiswa',
                'option_d' => 'Tidak dapat disimpulkan',
                'correct_answer' => 'B',
                'weight' => 10,
            ],
            [
                'question' => 'HTML digunakan untuk …',
                'option_a' => 'Mengolah database',
                'option_b' => 'Mengatur tampilan halaman web',
                'option_c' => 'Membuat sistem operasi',
                'option_d' => 'Mengedit gambar',
                'correct_answer' => 'B',
                'weight' => 10,
            ],
            [
                'question' => 'Hasil dari 12 × 8 adalah …',
                'option_a' => '86',
                'option_b' => '92',
                'option_c' => '96',
                'option_d' => '102',
                'correct_answer' => 'C',
                'weight' => 10,
            ],
            [
                'question' => 'Perangkat keras komputer yang berfungsi sebagai otak komputer adalah …',
                'option_a' => 'RAM',
                'option_b' => 'Harddisk',
                'option_c' => 'CPU',
                'option_d' => 'Monitor',
                'correct_answer' => 'C',
                'weight' => 10,
            ],
            [
                'question' => 'Jika hari ini hari Senin, maka 10 hari lagi adalah …',
                'option_a' => 'Rabu',
                'option_b' => 'Kamis',
                'option_c' => 'Jumat',
                'option_d' => 'Sabtu',
                'correct_answer' => 'B',
                'weight' => 10,
            ],
            [
                'question' => 'Bahasa pemrograman yang umum digunakan untuk pengembangan web backend adalah …',
                'option_a' => 'HTML',
                'option_b' => 'CSS',
                'option_c' => 'PHP',
                'option_d' => 'Figma',
                'correct_answer' => 'C',
                'weight' => 10,
            ],
            [
                'question' => 'Tujuan utama database dalam sistem informasi adalah …',
                'option_a' => 'Menyimpan data secara terstruktur',
                'option_b' => 'Mempercepat internet',
                'option_c' => 'Menambah RAM komputer',
                'option_d' => 'Mengganti sistem operasi',
                'correct_answer' => 'A',
                'weight' => 10,
            ],
        ];

        foreach ($questions as $q) {
            TestQuestion::create($q);
        }
    }
}
