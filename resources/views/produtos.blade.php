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
    <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Produtos</h1>
    <div class="mt-2">
        <a href="{{ route('produtos.create') }}"
            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-fuchsia-200 dark:focus:ring-blue-800">
            Adicionar
        </a>
    </div>
</div>

<div class="relative overflow-x-auto shadow-lg sm:rounded-lg max-w-5xl mx-auto mt-12 border border-fuchsia-900">
    <table
        class="w-full text-sm text-left rtl:text-right text-fuchsia-900 dark:text-fuchsia-50 rounded-lg dark:bg-fuchsia-900">
        <thead class="text-xs text-fuchsia-700 uppercase bg-fuchsia-200 dark:bg-fuchsia-900 dark:text-fuchsia-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Preço
                </th>

                <th scope="col" class="px-6 py-3 text-center">
                    Marca
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Cor
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Tecido
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Quantidade
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody class="bg-fuchsia-50 border-t dark:bg-fuchsia-100 dark:border-fuchsia-900">
            @foreach($produtos as $produto)
            <tr class="hover:bg-fuchsia-100 dark:hover:bg-fuchsia-200 border-t border-fuchsia-900">
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->id}}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->nome}}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    R$ {{$produto->preco}}
                </td>

                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->marca->nome }}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->cor->nome }}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->categoria->nome }}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->tecido->nome }}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                    {{$produto->quantidade}}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a href="{{ route('produtos.destroy', $produto->id) }} "
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (session('showProdutoDeleteModal'))
<div id="popup-modal" tabindex="-1"
    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="bg-fuchsia-200 rounded-lg shadow-2xl">
            <form action="{{ route('produtos.closeModalDelete') }}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="text-fuchsia-400 hover:bg-fuchsia-300 hover:text-white rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-800 dark:hover:text-white">
                    <svg class="w-3 h-3 text-fuchsia-950 hover:text-fuchsia-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </form>

            <div class="p-4 text-center">
                <svg class="mx-auto mb-4 text-fuchsia-900 w-12 h-12" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-fuchsia-900">Você tem certeza que deseja excluir este produto?</h3>
                <form action="{{ route('produtos.confirmDelete', session('produtoDeleteId')) }}" method="POST"
                    class="inline">
                    @csrf
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 px-5 py-2.5 rounded-lg text-sm">Confirmar</button>
                </form>
                <a href="{{ route('produtos.index') }}"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection