<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $criterias = [
            ['name' => 'A. CHOICE OF SONG', 'percentage' => 30],
            ['name' => 'B. BLENDING', 'percentage' => 30],
            ['name' => 'C. Originality of Presentation', 'percentage' => 20],
            ['name' => 'D. Stage Presence / Audience Impact', 'percentage' => 20]
        ];
    
        foreach ($criterias as $criteria) {
            Criteria::create([
                'name' => $criteria['name'],
                'percentage' => $criteria['percentage'],
                'added_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
