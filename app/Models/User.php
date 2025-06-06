<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'phone',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol() 
    {
        return $this->belongsTo('App\Models\Rol');
    }

    public function addresses() 
    {
        return $this->hasMany('App\Models\Address');
    }

    public function payments() 
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function favoritesList(){
        return $this->hasOne('App\Models\FavoritesList');
    }

    public function cart(){
        return $this->hasOne("App\Models\Cart");
    }
}
