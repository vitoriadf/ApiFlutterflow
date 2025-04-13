@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="max-w-5xl mx-auto mt-12 mb-8 flex justify-between items-center">
        <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Home</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
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
</div>
@endsection