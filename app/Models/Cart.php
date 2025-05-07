<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];
    
    public function cartLines(){
        return $this->hasMany("App\Models\CartLine");
    }

    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
