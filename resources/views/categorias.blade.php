@extends('master')
@include('nav')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="flex items-center justify-between mb-6 mt-3">
   
    <h1 class="text-2xl font-semibold ">Categorias</h1>

  
    <a href="{{ route('categorias.create') }}" class="text-blue-600 dark:text-blue-500 hover:underline mt-2 inline-block">
        Adicionar Categoria
    </a>
</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-4xl mx-auto mt-6">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{$categoria->id}}
                </td>
                <td class="px-6 py-4">
                    {{$categoria->nome}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a> |
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</a> |
                    <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Detalhes</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


 
</body>
</html>
