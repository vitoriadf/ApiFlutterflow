<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nome'];

   
   


    public static function booted()
    {
        static::deleting(function ($marca) {
            $marca->produtos()->delete(); 
        });
    }
}
