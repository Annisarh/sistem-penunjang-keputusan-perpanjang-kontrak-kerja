<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'kode' => 'A1',
                'nama' => 'Edriyan Pratama',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2021-08-5'),
                'tglakhir' => Carbon::parse('2021-11-5')
            ],
            [
                'kode' => 'A2',
                'nama' => 'Loli Agustin',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2022-07-27'),
                'tglakhir' => Carbon::parse('2022-10-27')
            ],
            [
                'kode' => 'A3',
                'nama' => 'Dedek Firmantoni',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2022-10-29'),
                'tglakhir' => Carbon::parse('2023-02-29')
            ],
            [
                'kode' => 'A4',
                'nama' => 'Dicky Nofladesvana',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2022-12-12'),
                'tglakhir' => Carbon::parse('2023-03-12')
            ],
            [
                'kode' => 'A5',
                'nama' => 'Anita Mariasis',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2023-04-27'),
                'tglakhir' => Carbon::parse('2023-07-27')
            ],
            [
                'kode' => 'A6',
                'nama' => 'Monica Rahma Lisa',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2023-05-5'),
                'tglakhir' => Carbon::parse('2023-08-5')
            ],
            [
                'kode' => 'A7',
                'nama' => 'Rahmat Kurnia Wansyah',
                'user_id' => 2,
                'posisi' => 'Sales Consultant',
                'tglawal' => Carbon::parse('2023-08-23'),
                'tglakhir' => Carbon::parse('2023-11-23')
            ],
            [
                'kode' => 'A8',
                'nama' => 'Annisa Ardhia Pramesti',
                'user_id' => 2,
                'tglawal' => Carbon::parse('2023-08-23'),
                'tglakhir' => Carbon::parse('2023-11-23')
            ],
            [
                'kode' => 'A9',
                'nama' => 'Vanny Amelia',
                'user_id' => 2,
                'tglawal' => Carbon::parse('2023-10-18'),
                'tglakhir' => Carbon::parse('2024-01-18')
            ],
            [
                'kode' => 'A10',
                'nama' => 'Robertio Leandro',
                'user_id' => 2,
                'tglawal' => Carbon::parse('2025-01-28'),
                'tglakhir' => Carbon::parse('2025-04-28')
            ]
        ];

        foreach($userData as $key => $val){
            Alternative::create($val);
        }
    }
}
