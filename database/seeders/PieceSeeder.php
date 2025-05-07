<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Piece;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PieceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $pieces = Piece::factory(15)->state(new Sequence(
            fn (Sequence $sequence) => ['image' => 'resources/assets/'. str_replace(' ','_',$categories->pluck('name')->random()).'/image'.rand(1,5)]
        ))->create();
        foreach($pieces as $piece)
            foreach($categories as $category)
                if(strpos($piece->image,str_replace(' ','_',$category->name)))
                    $piece->categories()->attach($category);

    }
}
