@extends('layouts.app')

@section('header')
<h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Produtos</h1>
@endsection

@section('content')
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
                    {{$produto->quantidade}}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="inline-flex space-x-4">
                        <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a href="{{ route('produtos.destroy', $produto->id) }}"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
