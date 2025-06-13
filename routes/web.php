<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CorController;

use App\Http\Controllers\TecidoController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

