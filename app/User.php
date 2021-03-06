<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Buy;
use App\Sell;
use App\Order;
use App\Balance;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens, Notifiable, HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id','name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function buys(){
    return $this->hasMany(Buy::class);
  }

  public function sells(){
    return $this->hasMany(Sell::class);
  }


  public function Orders(){
    return $this->hasMany(Order::class);
  }

  public function balance(){
    return $this->hasOne(Balance::class);
  }

}
