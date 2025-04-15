<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Marca;
use App\Models\Tecido;
use App\Models\Categoria;
use App\Models\Cor;

class HomeController extends Controller
{
    public function index()
    {
        $ultimosProdutos = Produto::with(['marca', 'categoria', 'tecido'])
            ->latest()
            ->take(5)
            ->get();

        return view('home', [
            'totalProdutos' => Produto::count(),
            'totalMarcas' => Marca::count(),
            'totalTecidos' => Tecido::count(),
            'totalCategorias' => Categoria::count(),
            'totalCores' => Cor::count(),
            'ultimosProdutos' => $ultimosProdutos,
        ]);
    }
}
