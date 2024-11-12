<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public readonly Categoria $categoria;
    public function __construct()
    {
        $this-> categoria = new Categoria();
    }

    public function index()
{
    $categorias = $this->categoria->all(); 
    return view('categorias', ['categorias' => $categorias] );
}


    
    public function create()
    {
       return view('categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $create = $this->categoria->create([
        'nome'=> $request->input('nome')
      ]);

      if($create){
        return redirect()->back()->with('message','categoria adicionada com sucesso');
      }
      return redirect()->back()->with('message','erro ao adionar nova categoria');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
       return view('categoria_show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
       return view('categoria_edit', ['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $update = $this->categoria->where('id',$id)->update($request->except(['_token','_method']));
       if($update){
            return redirect()->back()->with('message','editado com sucesso');
       }
       return redirect()->back()->with('message','erro ao editar');
    }

  
 
    public function destroy(string $id)
    {
        $this->categoria->where('id',$id)->delete();
        return redirect()->route('categorias.index');
    }
}
