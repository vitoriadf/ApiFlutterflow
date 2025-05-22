<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model

{
    protected $table = 'cores'; 
    protected $fillable = ['nome'];

    

    public static function booted()
    {
        static::deleting(function ($cor) {
            $cor->produtos()->delete(); 
        });
    }
}
