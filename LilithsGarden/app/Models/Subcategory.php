<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function productos(){
        return $this->belongsToMany(Product::class);
    }
    public function categorias(){
        return $this->belongsTo(Category::class);
    }

    public function carrousel()
    {
        return $this->hasOne(Carrousel::class);
    }
}
