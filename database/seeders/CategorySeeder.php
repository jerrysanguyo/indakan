<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'BARRIO DANCES',
            'CORDILLERA',
            'MINDANAO',
            'SPANISH INFLUENCE'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'added_by' => 1,
                'updated_by' => 1,
            ]);
        }
    }
}
