<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public readonly Marca $marca;

    public function __construct()
    {
        $this->marca = new Marca();
    }

    public function index()
    {
        $marcas = $this->marca->all();
        return view('marcas', ['marcas' => $marcas]);
    }

    public function create()
    {
        return redirect()->route('marcas.index')->with('showMarcaModal', true);
    }



    public function store(Request $request)
    {
        $create = $this->marca->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {

            return redirect()->route('marcas.index')->with('message', 'Marca adicionada com sucesso')->with('showMarcaModal', false);
        }
        return redirect()->back()->with('message', 'Erro ao adicionar nova marca');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        return view('marca_show', ['marca' => $marca]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return redirect()->route('marcas.index')->with(['showMarcaEditModal' => true, 'marca' => $marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $this->marca->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->route('marcas.index')->with('message', 'Editado com sucesso')->with('showMarcaEditModal', false);
        }
        return redirect()->route('marcas.index')->with('message', 'Erro ao editar')->with('showMarcaEditModal', false);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('marcas.index')
            ->with('showMarcaDeleteModal', true)
            ->with('marcaDeleteId', $id);
    }


    public function confirmDelete(string $id)
    {
        $marca = $this->marca->find($id);

        if ($marca) {
            $marca->delete();
            return redirect()->route('marcas.index')
                ->with('message', 'Marca excluída com sucesso')
                ->with('showMarcaDeleteModal', false);
        }

        return redirect()->route('marcas.index')
            ->with('message', 'Erro ao excluir marca')
            ->with('showMarcaDeleteModal', false);
    }


    public function closeModal()
    {
        return redirect()->route('marcas.index')->with('showMarcaModal', false);
    }

    public function closeModalEdit()
    {
        return redirect()->route('marcas.index')->with('showMarcaEditModal', false);
    }

    public function closeModalDelete()
    {
        return redirect()->route('marcas.index')->with('showMarcaDeleteModal', false);
    }
}
