<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::create([
            'name' => 'Summer Sale',
            'code' => 'SUMMER10',
            'percentage' => 10.00, // 10% de descuento
            'valid' => true, // Descuento válido
        ]);

        Discount::create([
            'name' => 'Welcome Discount',
            'code' => 'WELCOME5',
            'percentage' => 5.00, // 5% de descuento
            'valid' => true, // Descuento válido
        ]);
    }
}
