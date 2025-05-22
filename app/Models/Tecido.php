<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecido extends Model
{
    protected $fillable = ['nome']; 
    
   

    public static function booted()
    {
        static::deleting(function ($tecido) {
            $tecido->produtos()->delete(); 
        });
    }
}
