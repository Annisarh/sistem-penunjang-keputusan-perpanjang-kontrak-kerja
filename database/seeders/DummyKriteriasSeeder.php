<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'kode' => 'C1',
                'nama' => 'Jumlah Penjualan',
                'bobot' => 0.35,
                'benefited' => 1,
                'user_id' => 2
            ],
            [
                'kode' => 'C2',
                'nama' => 'Pelayanan',
                'bobot' => 0.25,
                'benefited' => 1,
                'user_id' => 2
            ],
            [
                'kode' => 'C3',
                'nama' => 'Penampilan',
                'bobot' => 0.20,
                'benefited' => 1,
                'user_id' => 2
            ],
            [
                'kode' => 'C4',
                'nama' => 'Absensi',
                'bobot' => 0.20,
                'benefited' => 1,
                'user_id' => 2
            ]
        ];

        foreach($userData as $key => $val){
            Criteria::create($val);
        }
    }
}
