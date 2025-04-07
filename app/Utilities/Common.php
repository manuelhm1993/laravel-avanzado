<?php

namespace App\Utilities;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class Common
{
    public static function listarCategorias(): Collection
    {
        $categorias = Category::orderBy('name', 'ASC')->get();
        return $categorias;
    }

    public static function listarProductos(): Collection
    {
        $productos = Product::with('category')
                            ->orderBy('category_id', 'DESC')
                            ->orderBy('name', 'ASC')
                            ->get();
        return $productos;
    }

    public static function listarProductosCategoria(string $categoria): Collection | array
    {
        $category = Category::where('name', 'like', "%{$categoria}%")->first();
        $productos = [];

        if(!is_null($category))
        {
            $productos = Product::where('category_id', $category->id)
                                ->orderBy('category_id', 'DESC')
                                ->orderBy('name', 'ASC')
                                ->get();
        }
        return $productos;
    }
}