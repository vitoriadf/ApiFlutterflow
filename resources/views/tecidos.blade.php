@extends('layouts.app')

@section('content')

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

<div class="max-w-5xl mx-auto mt-12 mb-6 flex justify-between items-center">
    <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Tecidos</h1>
    <div class="mt-2">
        <a href="{{ route('tecidos.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-fuchsia-200 dark:focus:ring-blue-800">
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
            @foreach($tecidos as $tecido)
            <tr class="hover:bg-fuchsia-100 dark:hover:bg-fuchsia-200 border-t border-fuchsia-900">
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$tecido->id}}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$tecido->nome}}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('tecidos.edit', ['tecido' => $tecido->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a href="{{ route('tecidos.destroy', $tecido->id) }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if(session('showTecidoModal'))
<div class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-xl min-h-[400px]">
        <div class="relative bg-fuchsia-200 text-fuchsia-900 rounded-lg shadow-2xl">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-fuchsia-950">
                <h3 class="text-lg font-semibold">Adicionar Novo Tecido</h3>
                <form action="{{ route('tecidos.closeModal') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-900 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </form>
            </div>

            <form action="{{ route('tecidos.store') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nome" class="block mb-2 text-sm font-medium">Nome do Tecido</label>
                        <input type="text" name="nome" id="nome" class="bg-fuchsia-200 border border-gray-400 text-fuchsia-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-fuchsia-200 dark:border-fuchsia-300 dark:placeholder-fuchsia-400 dark:text-fuchsia-900 dark:focus:ring-fuchsia-900 dark:focus:border-fuchsia-900" placeholder="Digite o nome do tecido">
                    </div>
                </div>

                <div class="flex justify-center space-x-4 mt-6">
                    <a href="{{ route('tecidos.index') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
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
@if(session('showTecidoEditModal'))
<div class="fixed inset-0 z-50 flex justify-center items-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-xl min-h-[400px]">
        <div class="relative bg-fuchsia-200 text-fuchsia-900 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-fuchsia-950">
                <h3 class="text-lg font-semibold">Editar Tecido</h3>
                <form action="{{ route('tecidos.closeModalEdit') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-900 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </form>
            </div>
            <form action="{{ route('tecidos.update', session('tecido')->id) }}" method="POST" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nome" class="block mb-2 text-sm font-medium">Nome do Tecido</label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome', session('tecido')->nome) }}" class="bg-fuchsia-200 border border-gray-400 text-fuchsia-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-fuchsia-200 dark:border-fuchsia-300 dark:placeholder-fuchsia-400 dark:text-fuchsia-900 dark:focus:ring-fuchsia-900 dark:focus:border-fuchsia-900" placeholder="Digite o nome do tecido">
                    </div>
                </div>
                <div class="flex justify-center space-x-4 mt-6">
                    <button type="submit" class="text-white items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Atualizar
                    </button>
                    <a href="{{ route('tecidos.index') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-gray-600 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
                        Fechar
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endif
@endsection