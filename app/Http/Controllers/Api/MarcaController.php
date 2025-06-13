<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Exibe uma lista de marcas.
     */
    public function index()
    {
        $marcas = Marca::all();

        return response()->json([
            'marcas' => $marcas
        ]);
    }

    /**
     * Armazena uma nova marca.
     */
    public function store(StoreUpdateMarcaRequest $request)
    {
        $marca = Marca::create($request->validated());

        return response()->json([
            'message' => 'Marca criada com sucesso',
            'data' => $marca
        ], 201);
    }

    /**
     * Exibe uma marca específica.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        return response()->json(['data' => $marca]);
    }

    /**
     * Atualiza uma marca específica.
     */
    public function update(StoreUpdateMarcaRequest $request, string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        $marca->update($request->validated());

        return response()->json([
            'message' => 'Marca atualizada com sucesso',
            'data' => $marca
        ]);
    }

    /**
     * Remove uma marca específica.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);

        if (!$marca) {
            return response()->json(['message' => 'Marca não encontrada'], 404);
        }

        $marca->delete();

        return response()->json(['message' => 'Marca excluída com sucesso']);
    }
}
