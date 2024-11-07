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
        return view('marca_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $this->marca->create([
            'nome' => $request->input('nome')
        ]);

        if ($create) {
            return redirect()->back()->with('message', 'Marca adicionada com sucesso');
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
        return view('marca_edit', ['marca' => $marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $this->marca->where('id', $id)->update($request->except(['_token', '_method']));
        if ($update) {
            return redirect()->back()->with('message', 'Editado com sucesso');
        }
        return redirect()->back()->with('message', 'Erro ao editar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->marca->where('id', $id)->delete();
        return redirect()->route('marcas.index');
    }
}