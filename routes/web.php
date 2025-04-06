<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
                foreach ($categoria as $producto) 
                {
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
});