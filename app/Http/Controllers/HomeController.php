<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
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

        $categorias = $dataCategorias;

        return view('home', compact('productos', 'categorias'));
    }
}
