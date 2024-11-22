@extends('layouts.app')



@section('content')
<div class="container mx-auto p-6 bg-fuchsia-200 max-w-4xl">
    <h1 class="text-4xl font-semibold text-center text-fuchsia-900 mb-2 mt-5">Cadastrar Produto</h1>
    <p class="text-center text-fuchsia-900 mb-4">Preencha os campos abaixo</p>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="nome" class="block mb-2 text-sm font-medium text-fuchsia-900">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 placeholder-fuchsia-900 w-full max-w-md" placeholder="Nome do produto" required>
            </div>

            <div class="col-span-1">
                <label for="preco" class="block mb-2 text-sm font-medium text-fuchsia-900">Preço</label>
                <input type="number" name="preco" id="preco"
                    class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 placeholder-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md"
                    placeholder="Preço" required>
            </div>
        </div>

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="marca" class="block mb-2 text-sm font-medium text-fuchsia-900">Marca</label>
                <select name="marca_id" id="marca"
                    class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md"
                    required>
                    <option value="">Selecione uma Marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label for="cor" class="block mb-2 text-sm font-medium text-fuchsia-900">Cor</label>
                <select name="cor_id" id="cor"
                    class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md"
                    required>
                    <option value="">Selecione uma Cor</option>
                    @foreach($cores as $cor)
                    <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="categoria" class="block mb-2 text-sm font-medium text-fuchsia-900">Categoria</label>
                <select name="categoria_id" id="categoria"
                    class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md"
                    required>
                    <option value="">Selecione uma Categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label for="quantidade" class="block mb-2 text-sm font-medium text-fuchsia-900">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade"
                    class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 placeholder-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md"
                    placeholder="Quantidade" required>
            </div>
        </div>

        <div class="flex justify-center space-x-4 mt-6">
            <a href="{{ route('produtos.index') }}"
                class="py-4 px-6 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-700 hover:text-black focus:outline-none">
                Voltar
            </a>
            <button type="submit"
                class="text-white py-4 px-6 bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg focus:ring-4 focus:ring-fuchsia-500">
                Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection