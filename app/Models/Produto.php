<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    
    protected $fillable = ['nome', 'preco', 'quantidade', 'categoria_id','marca_id','cor_id','quantidade'];  

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }
}