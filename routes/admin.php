<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Prueba rutas admin';
})->name('dashboard');