<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Creación de un endpoint
Route::get('productos', function () {
    $categorias = [
        'Verduras' => [
            'Tomates',
            'Lechuga',
            'Cebolla',
        ],
        'Fideos' => [
            'Tallarines',
            'Cabello de ángel',
            'Vermicelli',
        ],
    ];

    $productos = [];

    foreach($categorias as $categoria)
    {
        foreach ($categoria as $producto) 
        {
            $productos[] = $producto;
        }
    }

    //Devolver los productos en formato json
    return response()->json($productos);
});

Route::get('categorias', function () {
    $categorias = [
        'Informática',
        'Hogar',
        'Cocina'
    ];

    return response()->json($categorias);
});