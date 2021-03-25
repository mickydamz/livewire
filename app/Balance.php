<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Balance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','BTC','ETH', 'LTC'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
