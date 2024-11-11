@extends('master')
@include('nav')

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-fuchsia-50">
    <div class="max-w-5xl mx-auto mt-12 mb-6 flex justify-between items-center">
        <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Cores</h1>
        <div class="mt-2">
            <a href="{{ route('cores.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                Adicionar
            </a>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-5xl mx-auto mt-12 border border-fuchsia-900">
        <table class="w-full text-sm text-left rtl:text-right text-fuchsia-900 dark:text-fuchsia-50 rounded-lg">
            <thead class="text-xs text-fuchsia-700 uppercase bg-fuchsia-50 dark:bg-fuchsia-900 dark:text-fuchsia-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">ID</th>
                    <th scope="col" class="px-6 py-3 text-center">Nome</th>
                    <th scope="col" class="px-6 py-3 text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-fuchsia-50 border-t dark:bg-fuchsia-50 dark:border-fuchsia-900">
                @foreach($cores as $cor)
                <tr class="hover:bg-fuchsia-50 dark:hover:bg-fuchsia-50 border-t border-fuchsia-900">
                    <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">{{$cor->id}}</td>
                    <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">{{$cor->nome}}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex space-x-4">
                            <a href="{{ route('cores.edit', ['cor' => $cor->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('cores.destroy', ['cor' => $cor->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</button>
                            </form>
                            <a href="{{ route('cores.show', ['cor' => $cor->id]) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detalhes</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session('showModal'))

<div class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-xl min-h-[400px]">
        <div class="relative bg-fuchsia-50 text-fuchsia-900 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-fuchsia-950">
                <h3 class="text-lg font-semibold">
                    Adicionar Nova Cor
                </h3>
                <form action="{{ route('cores.closeModal') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-fuchsia-900 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </form>
            </div>

            <form action="{{ route('cores.store') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nome" class="block mb-2 text-sm font-medium">Nome da Cor</label>
                        <input type="text" name="nome" id="nome" class="bg-fuchsia-50 border border-gray-400 text-fuchsia-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-fuchsia-50 dark:border-gray-400 dark:placeholder-gray-400 dark:text-fuchsia-900 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Digite o nome da cor" required>
                    </div>
                </div>

                <div class="flex justify-center space-x-4 mt-6">
                <form action="{{ route('cores.closeModal') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-fuchsia-50 bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Fechar
                        </button>
                    </form>
                    <button type="submit" class="text-white items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Adicionar
                    </button>

                    
                </div>
            </form>
        </div>
    </div>
</div>
@endif


</body>

</html>
