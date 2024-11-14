<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\TamanhoController;
use Illuminate\Support\Facades\Route;










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/categorias',[CategoriaController::class,'index'])->name('categorias.index');
Route::get('/categorias/create',[CategoriaController::class,'create'])->name('categorias.create');
Route::post('/categorias',[CategoriaController::class,'store'])->name('categorias.store');
Route::get('/categorias/{categoria}',[CategoriaController::class,'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit',[CategoriaController::class,'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}',[CategoriaController::class,'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}',[CategoriaController::class,'destroy'])->name('categorias.destroy');

Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
Route::get('/marcas/create', [MarcaController::class, 'create'])->name('marcas.create');
Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
Route::get('/marcas/{marca}', [MarcaController::class, 'show'])->name('marcas.show');
Route::get('/marcas/{marca}/edit', [MarcaController::class, 'edit'])->name('marcas.edit');
Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');
Route::post('/marcas/close-modal', [CorController::class, 'closeModal'])->name('marcas.closeModal');

Route::get('/cores', [CorController::class, 'index'])->name('cores.index');
Route::get('/cores/create', [CorController::class, 'create'])->name('cores.create');
Route::post('/cores', [CorController::class, 'store'])->name('cores.store');
Route::get('/cores/{cor}', [CorController::class, 'show'])->name('cores.show');
Route::get('/cores/{cor}/edit', [CorController::class, 'edit'])->name('cores.edit');
Route::put('/cores/{cor}', [CorController::class, 'update'])->name('cores.update');
Route::delete('/cores/{cor}', [CorController::class, 'destroy'])->name('cores.destroy');
Route::post('/cores/close-modal', [CorController::class, 'closeModal'])->name('cores.closeModal');

Route::get('/tamanhos', [TamanhoController::class, 'index'])->name('tamanhos.index');
Route::get('/tamanhos/create', [TamanhoController::class, 'create'])->name('tamanhos.create');
Route::post('/tamanhos', [TamanhoController::class, 'store'])->name('tamanhos.store');
Route::get('/tamanhos/{tamanho}', [TamanhoController::class, 'show'])->name('tamanhos.show');
Route::get('/tamanhos/{tamanho}/edit', [TamanhoController::class, 'edit'])->name('tamanhos.edit');
Route::put('/tamanhos/{tamanho}', [TamanhoController::class, 'update'])->name('tamanhos.update');
Route::delete('/tamanhos/{tamanho}', [TamanhoController::class, 'destroy'])->name('tamanhos.destroy');


});

require __DIR__.'/auth.php';
