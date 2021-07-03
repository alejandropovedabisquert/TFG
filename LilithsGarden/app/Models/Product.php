<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Nombre de rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }
    //pertenecer a muchos
    public function subcategorias()
    {
        return $this->belongsToMany(Subcategory::class);
    }
    //tiene muchos
    public function comments()
    {
        return $this->hasMany(Comment::class)->paginate(5);
    }
    // tiene muchos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    //Tiene uno
    public function orderLine()
    {
        return $this->hasOne(OrderLine::class);
    }
}
