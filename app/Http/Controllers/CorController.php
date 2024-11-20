<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public readonly Cor $cor;

    public function __construct()
    {
        $this->cor = new Cor();
    }

    public function index()
    {
        $cores = $this->cor->all();
        return view('cores', ['cores' => $cores]);
    }

    public function create()
    {
        return redirect()->route('cores.index')->with('showCorModal', true);
    }

    public function store(Request $request)
    {
        $create = $this->cor->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {
            return redirect()->route('cores.index')->with('message', 'Cor adicionada com sucesso')->with('showCorModal', false);
        }

        return redirect()->back()->with('message', 'Erro ao adicionar nova cor');
    }

    public function show(Cor $cor)
    {
        return view('cor_show', ['cor' => $cor]);
    }

    public function edit(Cor $cor)
    {
        return redirect()->route('cores.index')->with(['showCorEditModal' => true, 'cor' => $cor]);
    }

    public function update(Request $request, string $id)
    {
        $update = $this->cor->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->route('cores.index')->with('message', 'Cor editada com sucesso')->with('showCorEditModal', false);
        }

        return redirect()->route('cores.index')->with('message', 'Erro ao editar cor')->with('showCorEditModal', false);
    }

    public function destroy(string $id)
    {
        return redirect()->route('cores.index')
            ->with('showCorDeleteModal', true)
            ->with('corDeleteId', $id);
    }

    public function confirmDelete(string $id)
    {
        $cor = $this->cor->find($id);

        if ($cor) {
            $cor->delete();
            return redirect()->route('cores.index')
                ->with('message', 'Cor excluída com sucesso')
                ->with('showCorDeleteModal', false);
        }

        return redirect()->route('cores.index')
            ->with('message', 'Erro ao excluir cor')
            ->with('showCorDeleteModal', false);
    }

    public function closeModal()
    {
        return redirect()->route('cores.index')->with('showCorModal', false);
    }

    public function closeModalEdit()
    {
        return redirect()->route('cores.index')->with('showCorEditModal', false);
    }

    public function closeModalDelete()
    {
        return redirect()->route('cores.index')->with('showCorDeleteModal', false);
    }
}
