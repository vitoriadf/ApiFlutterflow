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
        return view('cor_create');
    }

    public function store(Request $request)
    {
        $create = $this->cor->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {
            return redirect()->back()->with('message', 'Cor adicionada com sucesso');
        }
        return redirect()->back()->with('message', 'Erro ao adicionar nova cor');
    }

    public function show(Cor $cor)
    {
        return view('cor_show', ['cor' => $cor]);
    }

    public function edit(Cor $cor)
    {
        return view('cor_edit', ['cor' => $cor]);
    }

    public function update(Request $request, string $id)
    {
        $update = $this->cor->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->with('message', 'Cor editada com sucesso');
        }
        return redirect()->back()->with('message', 'Erro ao editar cor');
    }

    public function destroy(string $id)
    {
        $this->cor->where('id', $id)->delete();
        return redirect()->route('cores.index');
    }
}