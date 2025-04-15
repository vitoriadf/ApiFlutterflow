@extends('layouts.app')

@section('content')
@if($errors->any())
<div id="alert-2" class="flex items-center p-4 mt-4 mb-1 text-red-800 rounded-md bg-red-50 dark:bg-red-400 dark:text-red-900 w-1/2 mx-auto" role="alert">
    <svg class="flex-shrink-0 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Erro</span>
    <div class="ms-2 text-sm font-medium">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1 hover:bg-red-200 inline-flex items-center justify-center h-6 w-6 dark:bg-red-800 dark:text-red-400 dark:hover:bg-red-900" aria-label="Fechar" onclick="document.getElementById('alert-2').style.display='none'">
        <span class="sr-only">Fechar</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

@if(session()->has('message')){


<div id="alert-2" class="flex items-center p-4 mt-4 mb-1 text-green-800 rounded-md bg-green-50 dark:bg-green-400 dark:text-green-900 w-1/2 mx-auto" role="alert">
    <svg class="flex-shrink-0 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Erro</span>
    <div class="ms-2 text-sm font-medium">
        <p>{{ session()->get('message') }}</p>
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1 hover:bg-red-200 inline-flex items-center justify-center h-6 w-6 dark:bg-green-800 dark:text-green-400 dark:hover:bg-green-900" data-dismiss-target="#alert-2" aria-label="Fechar" onclick="document.getElementById('alert-2').style.display='none'">
        <span class="sr-only">Fechar</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

}
@endif


<div class="container mx-auto p-6 bg-fuchsia-200 max-w-4xl">
    <h1 class="text-4xl font-semibold text-center text-fuchsia-900 mb-2 mt-5">Editar Produto</h1>
    <p class="text-center text-fuchsia-900 mb-4">Atualize as informações abaixo</p>

    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="nome" class="block mb-2 text-sm font-medium text-fuchsia-900">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 placeholder-fuchsia-900 w-full max-w-md" value="{{ old('nome', $produto->nome) }}">
            </div>

            <div class="col-span-1">
                <label for="preco" class="block mb-2 text-sm font-medium text-fuchsia-900">Preço</label>
                <input type="number" name="preco" id="preco" class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 placeholder-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md" value="{{ old('preco', $produto->preco) }}">
            </div>
        </div>

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="marca" class="block mb-2 text-sm font-medium text-fuchsia-900">Marca</label>
                <select name="marca_id" id="marca" class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md">
                    <option value="">Selecione uma Marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ $produto->marca_id == $marca->id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label for="cor" class="block mb-2 text-sm font-medium text-fuchsia-900">Cor</label>
                <select name="cor_id" id="cor" class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md">
                    <option value="">Selecione uma Cor</option>
                    @foreach($cores as $cor)
                    <option value="{{ $cor->id }}" {{ $produto->cor_id == $cor->id ? 'selected' : '' }}>{{ $cor->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div class="col-span-1">
                <label for="categoria" class="block mb-2 text-sm font-medium text-fuchsia-900">Categoria</label>
                <select name="categoria_id" id="categoria" class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md">
                    <option value="">Selecione uma Categoria</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1">
                <label for="tecido" class="block mb-2 text-sm font-medium text-fuchsia-900">Tecido</label>
                <select name="tecido_id" id="tecido"
                    class="form-select bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full max-w-md">
                    <option value="">Selecione um Tecido</option>
                    @foreach($tecidos as $tecido)
                    <option value="{{ $tecido->id }}" {{ $produto->tecido_id == $tecido->id ? 'selected' : '' }}>{{ $tecido->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-span-2 flex justify-center">
            <div class="w-full max-w-md">
                <label for="quantidade" class="block mb-2 text-sm font-medium text-fuchsia-900">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade"
                    class="form-control bg-fuchsia-200 border border-fuchsia-900 text-fuchsia-900 placeholder-fuchsia-900 rounded-lg p-2.5 focus:ring-2 focus:ring-fuchsia-900 w-full" value="{{ old('quantidade', $produto->quantidade) }}">
            </div>
        </div>

        <div class="flex justify-center space-x-4 mt-6">
            <a href="{{ route('produtos.index') }}" class="py-4 px-6 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-700 hover:text-black focus:outline-none">
                Voltar
            </a>
            <button type="submit" class="text-white py-4 px-6 bg-fuchsia-900 hover:bg-fuchsia-950 rounded-lg focus:ring-4 focus:ring-fuchsia-500">
                Atualizar
            </button>
        </div>
    </form>
</div>

@endsection