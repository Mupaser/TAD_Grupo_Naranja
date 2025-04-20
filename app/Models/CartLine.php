<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartLine extends Model
{
    use HasFactory;

    public function cart(){
        return $this->belongsTo("App\Models\Cart");
    }

    public function piece(){
        return $this->belongsTo("App\Models\Piece");
    }
}
