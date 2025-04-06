<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

function getProductosCategoria($getCategoria = false) {
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
    $dataCategorias = [];

    foreach($categorias as $key => $categoria)
    {
        $dataCategorias[] = $key;

        foreach ($categoria as $producto) 
        {
            $productos[] = $producto;
        }
    }

    return ($getCategoria) ? $dataCategorias : $productos;
}

Route::get('/', function () {
    $productos = getProductosCategoria();
    $categorias = getProductosCategoria(true);

    return view('home', compact('productos', 'categorias'));
});

//Agrupación de rutas con prefijos y nombres
Route::prefix('categorias')->name('categorias.')->group(function () {
    Route::get('/', function (Request $request) {
        $categorias = [
            'Verduras',
            'Fideos',
            'Arroz'
        ];

        $param = $request->query('nombre');

        //Verificar si existe un parámetro de query
        if(!is_null($param))
        {
            //Verificar si el parámetro es una categoría
            echo in_array($param, $categorias) ? "Existe la categoría {$param}" : "No existe la categoría {$param}";
        }
        else 
        {
            foreach($categorias as $categoria)
            {
                echo $categoria . '<br>';
            }
        }
    });

    //Definición de ruta parametrizada
    Route::get('/{nombreCategoria}', function ($nombreCategoria) {
        echo 'Productos de ' . $nombreCategoria;
    });
});

Route::prefix('productos')->name('productos.')->group(function() {
    //Definición de parámetro nulo
    Route::get('/{categoria?}', function (?string $categoria = null) {
        $productos = getProductosCategoria();

        return view('productos', compact('productos'));
    });
});