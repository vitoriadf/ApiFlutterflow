<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Tecido;
use Illuminate\Http\Request;

class TecidoController extends Controller
{
    public readonly Tecido $tecido;

    public function __construct()
    {
        $this->tecido = new Tecido();
    }

    public function index()
    {
        $tecidos = $this->tecido->all();
        return view('tecidos', ['tecidos' => $tecidos]);
    }

    public function create()
    {
        return redirect()->route('tecidos.index')->with('showTecidoModal', true);
    }

    public function store(StoreUpdateSupportRequest $request)
    {
        $create = $this->tecido->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {

            return redirect()->route('tecidos.index')->with('message', 'Marca adicionada com sucesso')->with('showTecidoModal', false);
        }
        return redirect()->back()->with('message', 'Erro ao adicionar nova marca');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecido $tecido)
    {
        return redirect()->route('tecidos.index')->with(['showTecidoEditModal' => true, 'tecido' => $tecido]);
    }


    public function update(Request $request, string $id)
    {
        $update = $this->tecido->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->route('tecidos.index')->with('message', 'Editado com sucesso')->with('showTecidoEditModal', false);
        }
        return redirect()->route('tecidos.index')->with('message', 'Erro ao editar')->with('showTecidoEditModal', false);
    }


    public function destroy(string $id)
    {
        return redirect()->route('tecidos.index')
            ->with('showTecidoDeleteModal', true)
            ->with('tecidoDeleteId', $id);
    }

    public function confirmDelete(string $id)
    {
        $tecido = $this->tecido->find($id);

        if ($tecido) {
            $tecido->delete();
            return redirect()->route('tecidos.index')
                ->with('message', 'Tecido excluída com sucesso')
                ->with('showTecidoDeleteModal', false);
        }

        return redirect()->route('Tecidos.index')
            ->with('message', 'Erro ao excluir tecido')
            ->with('showTecidoDeleteModal', false);
    }

    public function closeModal()
    {
        return redirect()->route('tecidos.index')->with('showTecidoModal', false);
    }

    public function closeModalEdit()
    {
        return redirect()->route('tecidos.index')->with('showTecidoEditModal', false);
    }
}
