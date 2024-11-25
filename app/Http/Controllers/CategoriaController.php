<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public readonly Categoria $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('categorias', ['categorias' => $categorias]);
    }

    public function create()
    {
        return redirect()->route('categorias.index')->with('showCategoriaModal', true);
    }

    public function store(StoreUpdateCategoriaRequest $request)
    {
        $create = $this->categoria->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {
            return redirect()->route('categorias.index')->with('message', 'Categoria adicionada com sucesso')->with('showCategoriaModal', false);
        }
        return redirect()->back()->with('message', 'Erro ao adicionar nova categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categoria_show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return redirect()->route('categorias.index')->with(['showCategoriaEditModal' => true, 'categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCategoriaRequest $request, string $id)
    {
        $update = $this->categoria->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->route('categorias.index')->with('message', 'Editado com sucesso')->with('showCategoriaEditModal', false);
        }
        return redirect()->route('categorias.index')->with('message', 'Erro ao editar')->with('showCategoriaEditModal', false);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('categorias.index')
            ->with('showCategoriaDeleteModal', true)
            ->with('categoriaDeleteId', $id);
    }

    public function confirmDelete(string $id)
    {
        $categoria = $this->categoria->find($id);

        if ($categoria) {
            $categoria->delete();
            return redirect()->route('categorias.index')
                ->with('message', 'Categoria excluída com sucesso')
                ->with('showCategoriaDeleteModal', false);
        }

        return redirect()->route('categorias.index')
            ->with('message', 'Erro ao excluir categoria')
            ->with('showCategoriaDeleteModal', false);
    }

    public function closeModal()
    {
        return redirect()->route('categorias.index')->with('showCategoriaModal', false);
    }

    public function closeModalEdit()
    {
        return redirect()->route('categorias.index')->with('showCategoriaEditModal', false);
    }

    public function closeModalDelete()
    {
        return redirect()->route('categorias.index')->with('showCategoriaDeleteModal', false);
    }
}
