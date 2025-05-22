<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    
    protected $fillable = [
        'nome'
    ];

  

    public static function booted()
    {
        static::deleting(function ($categoria) {
            $categoria->produtos()->delete(); 
        });
    }
}
