<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Llama a un controlador --invokable
Route::get('/', HomeController::class)->name('home');

//Agrupación de rutas con prefijos y nombres
Route::prefix('categorias')->name('categorias.')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/create/{nombreCategoria}', 'create')->name('create');

    //Definición de ruta parametrizada
    Route::get('/{nombreCategoria}', 'show')->name('show');
});

Route::prefix('productos')->name('productos.')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    
    Route::get('/create/{nombreProducto}/{category}', 'create')->name('create');
    //Definición de parámetro nulo
    Route::get('/{producto}', 'show')->name('show');
});