<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Frenos',
            'description' => 'Piezas de frenos',
        ]);

        Category::create([
            'name' => 'Motor',
            'description' => 'Piezas de motor',
        ]);

        Category::create([
            'name' => 'Carrocería',
            'description' => 'Piezas de carrocería',
        ]);

        Category::create([
            'name' => 'Sistema eléctrico',
            'description' => 'Piezas eléctricas',
        ]);

        Category::create([
            'name' => 'Liquidos',
            'description' => 'Liquidos para coche',
        ]);
    }
}
