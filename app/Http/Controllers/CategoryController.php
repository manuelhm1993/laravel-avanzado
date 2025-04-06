<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request): string | array
    {
        $categorias = [
            'Verduras',
            'Fideos',
            'Arroz'
        ];

        $param = $request->query('nombre');
        $data = [];
        $response = '';

        //Verificar si existe un parámetro de query
        if(!is_null($param))
        {
            //Verificar si el parámetro es una categoría
            $response = in_array($param, $categorias) ? "Existe la categoría {$param}" : "No existe la categoría {$param}";
        }
        else 
        {
            foreach($categorias as $categoria)
            {
                $data[] = $categoria;
            }
        }

        return (count($data) > 0) ? $data : $response;
    }

    public function show($categoria): string
    {
        return 'Productos de ' . $categoria;
    }
}
