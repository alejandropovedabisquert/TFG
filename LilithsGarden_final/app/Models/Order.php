<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderLines(){
        return $this->hasMany(OrderLine::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}