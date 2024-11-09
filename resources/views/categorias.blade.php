@extends('master')
@include('nav')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="max-w-5xl mx-auto mt-12 mb-6 flex justify-between items-center">
        <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Categorias</h1>
        <div class="mt-2">
            <a href="{{ route('categorias.create') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                Adicionar
            </a>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-5xl mx-auto mt-12 border border-fuchsia-900">
        <table class="w-full text-sm text-left rtl:text-right text-fuchsia-900 dark:text-fuchsia-50 rounded-lg">
            <thead class="text-xs text-fuchsia-700 uppercase bg-fuchsia-50 dark:bg-fuchsia-900 dark:text-fuchsia-50">
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
            <tbody class="bg-fuchsia-50 border-t dark:bg-fuchsia-50 dark:border-fuchsia-900">
                @foreach($categorias as $categoria)
                <tr class="hover:bg-fuchsia-50 dark:hover:bg-fuchsia-50 border-t border-fuchsia-900">
                    <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                        {{$categoria->id}}
                    </td>
                    <td class="px-6 py-4 text-fuchsia-900 text-center border-fuchsia-900">
                        {{$categoria->nome}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex space-x-4">
                            <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a>
                            <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detalhes</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>