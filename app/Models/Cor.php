<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cor extends Model

{
    protected $table = 'cores'; 
    protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public static function booted()
    {
        static::deleting(function ($cor) {
            $cor->produtos()->delete(); 
        });
    }
}
