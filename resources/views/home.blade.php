@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="max-w-5xl mx-auto mt-12 mb-8 flex justify-between items-center">
        <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Home</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
        <div class="bg-fuchsia-100 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-sm text-fuchsia-500 mb-1">Produtos</h2>
            <p class="text-3xl font-bold text-fuchsia-900">{{ $totalProdutos }}</p>
        </div>
        <div class="bg-fuchsia-100 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-sm text-fuchsia-500 mb-1">Marcas</h2>
            <p class="text-3xl font-bold text-fuchsia-900">{{ $totalMarcas }}</p>
        </div>
        <div class="bg-fuchsia-100 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-sm text-fuchsia-500 mb-1">Tecidos</h2>
            <p class="text-3xl font-bold text-fuchsia-900">{{ $totalTecidos }}</p>
        </div>
        <div class="bg-fuchsia-100 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-sm text-fuchsia-500 mb-1">Categorias</h2>
            <p class="text-3xl font-bold text-fuchsia-900">{{ $totalCategorias }}</p>
        </div>
        <div class="bg-fuchsia-100 rounded-xl shadow-lg p-6 text-center">
            <h2 class="text-sm text-fuchsia-500 mb-1">Cores</h2>
            <p class="text-3xl font-bold text-fuchsia-900">{{ $totalCores }}</p>
        </div>
    </div>

    <div class="bg-fuchsia-100 shadow-md rounded-xl p-6 mt-6">
        <h2 class="text-lg font-semibold text-fuchsia-900 mb-4">Últimos Produtos Cadastrados</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b text-fuchsia-700">
                        <th class="py-2">Nome</th>
                        <th class="py-2">Preço</th>
                        <th class="py-2">Marca</th>
                        <th class="py-2">Categoria</th>
                        <th class="py-2">Tecido</th>
                        <th class="py-2">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimosProdutos as $produto)
                        <tr class="border-b hover:bg-fuchsia-200 text-fuchsia-900">
                            <td class="py-2">{{ $produto->nome }}</td>
                            <td class="py-2">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="py-2">{{ $produto->marca->nome}}</td>
                            <td class="py-2">{{ $produto->categoria->nome}}</td>
                            <td class="py-2">{{ $produto->tecido->nome }}</td>
                            <td class="py-2">{{ $produto->quantidade }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection