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
            'A. Overall Performance, Difficulty, artistry of steps, mastery precision.',
            'B. Choreography, Unique and authenticity, concept, formation.',
            'C. Theme and Music: Musicality, beat techniques, timing, Synchronization, moves related to the music.',
            'D. Costumes, props'
        ];

        foreach ($criterias as $criteria) {
            Criteria::create([
                'name' => $criteria,
                'added_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
