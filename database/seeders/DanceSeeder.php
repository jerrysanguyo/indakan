<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dance;

class DanceSeeder extends Seeder
{
    public function run(): void
    {
        $dances = [
            'ITIK ITIK',
            'KARATONG',
            'MAGLALATIK',
            'MAMUMUGON SA KAMPO',
            'BULAKLAKAN',
            'BAMO DANCE',
            'SUBLI DANCE',
            'RAGRAGSAKAN',
            'PATTONG NG KALINGA',
            'CORDILLERA',
            'LUMAGEN TACHOK',
            'IDUDU',
            'BANGA',
            'SUGOD UNO (BAGOBO RICE CYCLE)',
            'MARANAO DANCE-KAKULANGAN',
            'KAPPA MALONG-MALONG',
            'MAGIGAL',
            'MINDANAO',
            'SUA KU SUA ',
            'PASO DOBLE',
            'REGATONES',
            'PANDANGGO SA ILAW',
            'LA JOTA MANILEÑA',
            'SPAIN',
            'JOTA CAVITENA',
            'JOTA QUIRINO',
            'CAROLING'
        ];

        foreach ($dances as $dance) {
            Dance::create([
                'name' => $dance,
                'added_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
