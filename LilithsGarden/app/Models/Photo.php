<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
        
        //Relacion uno a muchos
        public function product(){
            return $this->belongsTo(Product::class);
        }

}
