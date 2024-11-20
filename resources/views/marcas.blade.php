@extends('layouts.app')

@section('header')
<h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Marcas</h1>
@endsection

@section('content')
<div class="max-w-5xl mx-auto mt-12 mb-6 flex justify-between items-center">
    <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Marcas</h1>
    <div class="mt-2">
        <a href="{{ route('marcas.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-fuchsia-200 dark:focus:ring-blue-800">
            Adicionar
        </a>
    </div>
</div>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg max-w-5xl mx-auto mt-12 border border-fuchsia-900">
    <table class="w-full text-sm text-left rtl:text-right text-fuchsia-900 dark:text-fuchsia-50 rounded-lg dark:bg-fuchsia-900 ">
        <thead class="text-xs text-fuchsia-700 uppercase bg-fuchsia-200 dark:bg-fuchsia-900 dark:text-fuchsia-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody class="bg-fuchsia-50 border-t dark:bg-fuchsia-100 dark:border-fuchsia-900">
            @foreach($marcas as $marca)
            <tr class="hover:bg-fuchsia-100 dark:hover:bg-fuchsia-200 border-t border-fuchsia-900">
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$marca->id}}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$marca->nome}}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('marcas.edit', ['marca' => $marca->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a href="{{ route('marcas.destroy', $marca->id) }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if(session('showMarcaModal'))
<div class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-xl min-h-[400px]">
        <div class="relative bg-fuchsia-200 text-fuchsia-900 rounded-lg shadow-2xl">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-fuchsia-950">
                <h3 class="text-lg font-semibold">Adicionar Nova Marca</h3>
                <form action="{{ route('marcas.closeModal') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-900 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </form>
            </div>

            <form action="{{ route('marcas.store') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nome" class="block mb-2 text-sm font-medium">Nome da Marca</label>
                        <input type="text" name="nome" id="nome" class="bg-fuchsia-200 border border-gray-400 text-fuchsia-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-fuchsia-200 dark:border-fuchsia-300 dark:placeholder-fuchsia-400 dark:text-fuchsia-900 dark:focus:ring-fuchsia-900 dark:focus:border-fuchsia-900" placeholder="Digite o nome da marca" required>
                    </div>
                </div>

                <div class="flex justify-center space-x-4 mt-6">

                    <a href="{{ route('marcas.index') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
                        fechar
                    </a>
                    <button type="submit" class="text-white items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Adicionar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@if(session('showMarcaEditModal'))
<div class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-xl min-h-[400px]">
        <div class="relative bg-fuchsia-200 text-fuchsia-900 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-fuchsia-950">
                <h3 class="text-lg font-semibold">Editar Marca</h3>
                <form action="{{ route('marcas.closeModalEdit') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-900 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </form>
            </div>
            <form action="{{ route('marcas.update', session('marca')->id) }}" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nome" class="block mb-2 text-sm font-medium">Nome da Marca</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome', session('marca')->nome) }}" class="bg-fuchsia-200 border border-gray-400 text-fuchsia-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-fuchsia-200 dark:border-fuchsia-300 dark:placeholder-fuchsia-400 dark:text-fuchsia-900 dark:focus:ring-fuchsia-900 dark:focus:border-fuchsia-900" placeholder="Digite o nome da marca" required>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 mt-6">
                    <button type="submit" class="text-white items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Atualizar
                    </button>
                    <a href="{{ route('marcas.index') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
                        Fechar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endif
@if (session('showMarcaDeleteModal'))
<div id="popup-modal" tabindex="-1" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="bg-fuchsia-200 rounded-lg shadow-2xl">
            <form action="{{ route('marcas.closeModalDelete') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-fuchsia-400 hover:bg-fuchsia-300  hover:text-white rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-800 dark:hover:text-white">
                    <svg class="w-3 h-3 text-fuchsia-950 hover:text-fuchsia-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </form>

            <div class="p-4 text-center">

                <svg class="mx-auto mb-4 text-fuchsia-900 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-fuchsia-900">Você tem certeza que deseja excluir esta marca?</h3>
                <form action="{{ route('marcas.confirmDelete', session('marcaDeleteId')) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 px-5 py-2.5 rounded-lg text-sm">Confirmar</button>
                </form>
                <a href="{{ route('marcas.index') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
</div>

@endif
@endsection