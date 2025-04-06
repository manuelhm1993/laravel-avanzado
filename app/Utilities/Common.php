<?php

namespace App\Utilities;

class Common
{
    private static array $categorias = [
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

    public static function getProductos() 
    {
        $productos = [];
    
        foreach(self::$categorias as $key => $categoria)
        {
            foreach ($categoria as $producto) 
            {
                $productos[] = $producto;
            }
        }
    
        return $productos;
    }

    public static function getCategorias() 
    {
        $dataCategorias = [];
    
        foreach(self::$categorias as $key => $categoria)
        {
            $dataCategorias[] = $key;
        }
    
        return $dataCategorias;
    }
}