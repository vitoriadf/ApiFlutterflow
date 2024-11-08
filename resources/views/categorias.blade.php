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
<div class="flex items-center px-5 mx-5 justify-between mb-6 mt-3 mb-6">
   
    <h1 class="text-2xl font-semibold ml-6 pl-6 ">Categorias</h1>

  
    <a href="{{ route('categorias.create') }}" class=" mr-6 pr-6 mt-2 focus:outline-none text-white bg-purple-900 hover:bg-fuchsia-900 focus:ring-4 focus:ring-fuchsia-900 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-fuchsia-900 dark:hover:bg-fuchsia-900 dark:focus:ring-fuchsia-900">
        Adicionar 
    </a>
</div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-4xl mx-auto mt-6">
    <table class="border border-fuchsia-900 w-full text-sm text-left rtl:text-right text-fuchsia-900 dark:text-fuchsia-50 ">
        <thead class="text-xs text-fuchsia-700 uppercase bg-fuchsia-50 dark:bg-fuchsia-900 dark:text-fuchsia-50">
            <tr>
                <th scope="col" class="px-6 py-3 ">
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
        <tbody class="bg-fuchsia-50 border-t border-b border-fuchsia-900 dark:bg-fuchsia-50 dark:border-fuchsia-900">
            @foreach($categorias as $categoria)
            <tr class="hover:bg-fuchsia-50 dark:hover:bg-fuchsia-50 border-b border-fuchsia-900">
                <td class="px-6 py-4 text-fuchsia-900 border-fuchsia-900 ">
                    {{$categoria->id}}
                </td>
                <td class="px-6 py-4 text-fuchsia-900 border-fuchsia-900">
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
