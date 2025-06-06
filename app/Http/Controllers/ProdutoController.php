<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
         return response()->json([
            'produtos' => $produtos,
            
         ]);
    }

    public function store(Produto $request)
    {
        $produto = Produto::create($request->validated());

        return response()->json([
            'message' => 'Produto criado com sucesso',
            'data' => $produto
        ], 201);
    }

    // public function show(string $id)
    // {
    //     $produto = Produto::with(['marca', 'cor', 'categoria', 'tecido'])->find($id);

    //     if (!$produto) {
    //         return response()->json(['message' => 'Produto não encontrado'], 404);
    //     }

    //     return response()->json($produto);
    // }

    public function update(Produto $request, string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->update($request->validated());

        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'data' => $produto
        ]);
    }

    public function destroy(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto excluído com sucesso']);
    }
}
