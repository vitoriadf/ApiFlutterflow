@extends('layouts.app')

@section('content')

<div class="">
    <div class="max-w-5xl mx-auto mt-12 mb-8 flex justify-between items-center">
        <h1 class="text-4xl text-fuchsia-900 font-semibold leading-none">Home</h1>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">

            <div class="max-w-sm w-full bg-fuchsia-900 text-white rounded-lg shadow-lg">
                <a href="{{ route('produtos.index') }}" class="block p-6">
                    <div class="flex items-center space-x-4 justify-center">
                        <div class="w-16 h-16 bg-fuchsia-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-fuchsia-900">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-fuchsia-200">Produtos</h2>
                            <p class="text-sm text-fuchsia-200 mt-2">Gerencie os produtos do estoque.</p>
                        </div>
                    </div>
                    <div class="mt-4 bg-fuchsia-200 text-fuchsia-900 rounded-full py-2 text-center font-semibold">
                        Acessar Estoque
                    </div>
                </a>
            </div>

            <div class="max-w-sm w-full bg-fuchsia-900 text-white rounded-lg shadow-lg">
                <a href="{{ route('marcas.index') }}" class="block p-6">
                    <div class="flex items-center space-x-4 justify-center">
                        <div class="w-16 h-16 bg-fuchsia-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-fuchsia-900">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-fuchsia-200">Marcas</h2>
                            <p class="text-sm text-fuchsia-200 mt-2">Gerencie as marcas cadastradas.</p>
                        </div>
                    </div>
                    <div class="mt-4 bg-fuchsia-200 text-fuchsia-900 rounded-full py-2 text-center font-semibold">
                        Acessar Estoque
                    </div>
                </a>
            </div>

            <div class="max-w-sm w-full bg-fuchsia-900 text-white rounded-lg shadow-lg">
                <a href="{{ route('categorias.index') }}" class="block p-6">
                    <div class="flex items-center space-x-4 justify-center">
                        <div class="w-16 h-16 bg-fuchsia-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-fuchsia-900">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-fuchsia-200">Categoria</h2>
                            <p class="text-sm text-fuchsia-200 mt-2">Gerencie as categorias cadastradas.</p>
                        </div>
                    </div>
                    <div class="mt-4 bg-fuchsia-200 text-fuchsia-900 rounded-full py-2 text-center font-semibold">
                        Acessar Estoque
                    </div>
                </a>
            </div>

           
            <div class="max-w-sm w-full bg-fuchsia-900 text-white rounded-lg shadow-lg">
                <a href="{{ route('cores.index') }}" class="block p-6">
                    <div class="flex items-center space-x-4 justify-center">
                        <div class="w-16 h-16 bg-fuchsia-200 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-fuchsia-900">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-fuchsia-200">Cores</h2>
                            <p class="text-sm text-fuchsia-200 mt-2">Gerencie as cores dos produtos.</p>
                        </div>
                    </div>
                    <div class="mt-4 bg-fuchsia-200 text-fuchsia-900 rounded-full py-2 text-center font-semibold">
                        Acessar Estoque
                    </div>
                </a>
            </div>

        </div>
    </div>

    @endsection