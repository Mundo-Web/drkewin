<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = ['Cirugías de Emergencia', ' Cirugía de Hernia Inguinal', 'Cirugía Bariátrica', 'Balón Gástrico'];

        for ($i = 0; $i <= 4; $i++) {
            Category::create([
                'name' => $category[$i],
                'description' => "-",
                'visible' => true,
                'status' => true,
            ]);
        }
    }
}
