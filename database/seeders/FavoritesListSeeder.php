<?php

namespace Database\Seeders;

use App\Models\FavoritesList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritesListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FavoritesList::create([
            "user_id" => 2   
        ]);
    }
}
