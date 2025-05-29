<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\FavoritesList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PaymentSeeder::class,
            RolSeeder::class,
            UserSeeder::class,
            FavoritesListSeeder::class,
            CartSeeder::class,
            CategorySeeder::class,
            PieceSeeder::class,
            DiscountSeeder::class,
        ]);
    }
}
