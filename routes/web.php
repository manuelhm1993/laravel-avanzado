<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Agrupación de rutas con prefijos y nombres
Route::prefix('categorias')->name('categorias.')->group(function () {
    Route::get('/', function () {
        $categorias = [
            'Verduras',
            'Fideos',
            'Arroz'
        ];
    
        foreach($categorias as $categoria)
        {
            echo $categoria . '<br>';
        }
    });

    Route::get('/oferta', function () {
        echo 'Categorías en oferta';
    });

    Route::get('/mas-vendidas', function () {
        echo 'Categorías más vendidas';
    });

    //Definición de ruta parametrizada
    Route::get('/{nombreCategoria}', function ($nombreCategoria) {
        echo 'Productos de ' . $nombreCategoria;
    });
});

//Definición de parámetro nulo
Route::get('productos/{categoria?}', function (?string $categoria = null) {
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

    //Comprobar si la categoría es nula para mostrar todos los productos
    if(is_null($categoria))
    {
        foreach($categorias as $categoria)
        {
            foreach ($categoria as $producto) {
                echo $producto . '<br>';
            }
        }
    }
    else
    {
        if(array_key_exists($categoria, $categorias))
        {
            foreach($categorias[$categoria] as $producto)
            {
                echo $producto . '<br>';
            }
        }
        else 
        {
            echo "La categoría {$categoria} no existe";
        }
    }
});