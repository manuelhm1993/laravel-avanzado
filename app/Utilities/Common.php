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

    public static function getProductos(?string $nombreCategoria = null): array
    {
        $response = [];

        if(!is_null($nombreCategoria) && array_key_exists($nombreCategoria, self::$categorias))
        {
            foreach(self::$categorias[$nombreCategoria] as $categoria)
            {
                $response[] = $categoria;
            }
        }
        else
        {
            foreach(self::$categorias as $categoria)
            {
                foreach ($categoria as $producto) 
                {
                    $response[] = $producto;
                }
            }
        }
    
        return $response;
    }

    public static function getCategorias(): array
    {
        $dataCategorias = [];
    
        foreach(self::$categorias as $key => $categoria)
        {
            $dataCategorias[] = $key;
        }
    
        return $dataCategorias;
    }
}