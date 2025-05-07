<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Piece>
 */
class PieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   

        return [
            'name' => 'piece'.rand(1,100),
            'price' => rand(10,100),
            'state' => Arr::random(['Available','Not available']),
            'offer' => rand(0,6)*0.1,
            'description' =>fake()->text(),
        ];
    }
}
