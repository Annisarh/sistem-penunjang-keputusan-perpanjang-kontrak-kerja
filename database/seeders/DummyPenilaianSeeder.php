<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'alternative_id' => 1,
                'criteria_id' => 1,
                'grade' => 1
            ],
            [
                'alternative_id' => 2,
                'criteria_id' => 1,
                'grade' => 4
            ],
            [
                'alternative_id' => 3,
                'criteria_id' => 1,
                'grade' => 1
            ],
            [
                'alternative_id' => 4,
                'criteria_id' => 1,
                'grade' => 3
            ],
            [
                'alternative_id' => 5,
                'criteria_id' => 1,
                'grade' => 2
            ],
            [
                'alternative_id' => 6,
                'criteria_id' => 1,
                'grade' => 4
            ],
            [
                'alternative_id' => 7,
                'criteria_id' => 1,
                'grade' => 2
            ],
            [
                'alternative_id' => 8,
                'criteria_id' => 1,
                'grade' => 1
            ],
            [
                'alternative_id' => 9,
                'criteria_id' => 1,
                'grade' => 4
            ],
            [
                'alternative_id' => 10,
                'criteria_id' => 1,
                'grade' => 2
            ],
            [
                'alternative_id' => 1,
                'criteria_id' => 2,
                'grade' => 1
            ],
            [
                'alternative_id' => 2,
                'criteria_id' => 2,
                'grade' => 3
            ],
            [
                'alternative_id' => 3,
                'criteria_id' => 2,
                'grade' => 3
            ],
            [
                'alternative_id' => 4,
                'criteria_id' => 2,
                'grade' => 4
            ],
            [
                'alternative_id' => 5,
                'criteria_id' => 2,
                'grade' => 4
            ],
            [
                'alternative_id' => 6,
                'criteria_id' => 2,
                'grade' => 3
            ],
            [
                'alternative_id' => 7,
                'criteria_id' => 2,
                'grade' => 2
            ],
            [
                'alternative_id' => 8,
                'criteria_id' => 2,
                'grade' => 2
            ],
            [
                'alternative_id' => 9,
                'criteria_id' => 2,
                'grade' => 4
            ],
            [
                'alternative_id' => 10,
                'criteria_id' => 2,
                'grade' => 4
            ],
            [
                'alternative_id' => 1,
                'criteria_id' => 3,
                'grade' => 3
            ],
            [
                'alternative_id' => 2,
                'criteria_id' => 3,
                'grade' => 3
            ],
            [
                'alternative_id' => 3,
                'criteria_id' => 3,
                'grade' => 4
            ],
            [
                'alternative_id' => 4,
                'criteria_id' => 3,
                'grade' => 4
            ],
            [
                'alternative_id' => 5,
                'criteria_id' => 3,
                'grade' => 4
            ],
            [
                'alternative_id' => 6,
                'criteria_id' => 3,
                'grade' => 3
            ],
            [
                'alternative_id' => 7,
                'criteria_id' => 3,
                'grade' => 2
            ],
            [
                'alternative_id' => 8,
                'criteria_id' => 3,
                'grade' => 5
            ],
            [
                'alternative_id' => 9,
                'criteria_id' => 3,
                'grade' => 4
            ],
            [
                'alternative_id' => 10,
                'criteria_id' => 3,
                'grade' => 3
            ],
            [
                'alternative_id' => 1,
                'criteria_id' => 4,
                'grade' => 3
            ],
            [
                'alternative_id' => 2,
                'criteria_id' => 4,
                'grade' => 5
            ],
            [
                'alternative_id' => 3,
                'criteria_id' => 4,
                'grade' => 3
            ],
            [
                'alternative_id' => 4,
                'criteria_id' => 4,
                'grade' => 4
            ],
            [
                'alternative_id' => 5,
                'criteria_id' => 4,
                'grade' => 3
            ],
            [
                'alternative_id' => 6,
                'criteria_id' => 4,
                'grade' => 5
            ],
            [
                'alternative_id' => 7,
                'criteria_id' => 4,
                'grade' => 3
            ],
            [
                'alternative_id' => 8,
                'criteria_id' => 4,
                'grade' => 5
            ],
            [
                'alternative_id' => 9,
                'criteria_id' => 4,
                'grade' => 3
            ],
            [
                'alternative_id' => 10,
                'criteria_id' => 4,
                'grade' => 5
            ]
        ];

        foreach($userData as $key => $val){
            Penilaian::create($val);
        }
    }
}
