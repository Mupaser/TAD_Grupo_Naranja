<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    public function orderLines(){
        return $this->hasMany("App\Models\OrderLine");
    }

    public function cartLines(){
        return $this->hasMany("App\Models\CartLine");
    }

    public function categories(){
        return $this->belongsToMany("App\Models\Category");
    }

    public function favoritesLists(){
        return $this->belongsToMany("App\Models\FavoritesList");
    }
}
