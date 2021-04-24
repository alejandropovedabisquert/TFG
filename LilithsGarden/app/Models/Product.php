<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion muchos a muchos
    public function categorias(){
        return $this->belongsToMany(Category::class);
    }

    //Relacion uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
