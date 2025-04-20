<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }

    public function orderLines(){
        return $this->hasMany('App\Models\OrderLine');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
