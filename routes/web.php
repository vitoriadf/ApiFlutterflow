<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TecidoController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::post('categorias/closeModal', [CategoriaController::class, 'closeModal'])->name('categorias.closeModal');
    Route::post('/categorias/close-modal-edit', [CategoriaController::class, 'closeModalEdit'])->name('categorias.closeModalEdit');
    Route::get('/categorias/{categoria}/delete', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::post('/categorias/{id}/confirm-delete', [CategoriaController::class, 'confirmDelete'])->name('categorias.confirmDelete');
    Route::post('/categorias/close-modal-delete', [CategoriaController::class, 'closeModalDelete'])->name('categorias.closeModalDelete');


    Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
    Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
    Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
    Route::get('/marcas/{marca}', [MarcaController::class, 'show'])->name('marcas.show');
    Route::get('/marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
    Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
    Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');
    Route::post('marcas/closeModal', [MarcaController::class, 'closeModal'])->name('marcas.closeModal');
    Route::post('/marcas/close-modal-edit', [MarcaController::class, 'closeModalEdit'])->name('marcas.closeModalEdit');
    Route::get('/marcas/{marca}/delete', [MarcaController::class, 'destroy'])->name('marcas.destroy');
    Route::post('/marcas/{id}/confirm-delete', [MarcaController::class, 'confirmDelete'])->name('marcas.confirmDelete');
    Route::post('/marcas/close-modal-delete', [MarcaController::class, 'closeModalDelete'])->name('marcas.closeModalDelete');

    Route::get('/cores', [CorController::class, 'index'])->name('cores.index');
    Route::get('/cores/create', [CorController::class, 'create'])->name('cores.create');
    Route::post('/cores', [CorController::class, 'store'])->name('cores.store');
    Route::get('/cores/{cor}', [CorController::class, 'show'])->name('cores.show');
    Route::get('/cores/{cor}/edit', [CorController::class, 'edit'])->name('cores.edit');
    Route::put('/cores/{cor}', [CorController::class, 'update'])->name('cores.update');
    Route::delete('/cores/{cor}', [CorController::class, 'destroy'])->name('cores.destroy');
    Route::post('cores/closeModal', [CorController::class, 'closeModal'])->name('cores.closeModal');
    Route::post('/cores/close-modal-edit', [CorController::class, 'closeModalEdit'])->name('cores.closeModalEdit');
    Route::get('/cores/{cor}/delete', [CorController::class, 'destroy'])->name('cores.destroy');
    Route::post('/cores/{id}/confirm-delete', [CorController::class, 'confirmDelete'])->name('cores.confirmDelete');
    Route::post('/cores/close-modal-delete', [CorController::class, 'closeModalDelete'])->name('cores.closeModalDelete');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
    Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::post('produtos/closeModal', [ProdutoController::class, 'closeModal'])->name('produtos.closeModal');
    Route::post('/produtos/close-modal-edit', [ProdutoController::class, 'closeModalEdit'])->name('produtos.closeModalEdit');
    Route::get('/produtos/{produto}/delete', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
    Route::post('/produtos/{id}/confirm-delete', [ProdutoController::class, 'confirmDelete'])->name('produtos.confirmDelete');
    Route::post('/produtos/close-modal-delete', [ProdutoController::class, 'closeModalDelete'])->name('produtos.closeModalDelete');

    Route::get('/tecidos', [TecidoController::class, 'index'])->name('tecidos.index');
    Route::get('/tecidos/create', [TecidoController::class, 'create'])->name('tecidos.create');
    Route::post('/tecidos', [TecidoController::class, 'store'])->name('tecidos.store');
    Route::get('/tecidos/{tecido}', [TecidoController::class, 'show'])->name('tecidos.show');
    Route::get('/tecidos/{tecido}/edit', [TecidoController::class, 'edit'])->name('tecidos.edit');
    Route::put('/tecidos/{tecido}', [TecidoController::class, 'update'])->name('tecidos.update');
    Route::delete('/tecidos/{tecido}', [tecidoController::class, 'destroy'])->name('tecidos.destroy');
    Route::post('tecido/closeModal', [TecidoController::class, 'closeModal'])->name('tecidos.closeModal');
    Route::post('/tecidos/close-modal-edit', [TecidoController::class, 'closeModalEdit'])->name('tecidos.closeModalEdit');
    Route::get('/tecidos/{tecido}/delete', [TecidoController::class, 'destroy'])->name('tecidos.destroy');
    Route::post('/tecidos/{id}/confirm-delete', [TecidoController::class, 'confirmDelete'])->name('tecidos.confirmDelete');
    Route::post('/tecidos/close-modal-delete', [TecidoController::class, 'closeModalDelete'])->name('Tecidos.closeModalDelete');




});

require __DIR__ . '/auth.php';
