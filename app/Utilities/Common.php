<?php

namespace App\Utilities;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class Common
{
    public static function listarCategorias(bool $products = false): Collection
    {
        $categorias = ($products) ? Category::with('products')->orderBy('name', 'ASC')->get() : Category::orderBy('name', 'ASC')->get();
        return $categorias;
    }

    public static function listarProductos(bool $category = true): Collection | array
    {
        $productos = [];

        if($category)
        {
            $productos = Product::with('category')
                            ->orderBy('category_id', 'DESC')
                            ->orderBy('name', 'ASC')
                            ->get();
        }
        else
        {
            $productos = Product::orderBy('category_id', 'DESC')
                            ->orderBy('name', 'ASC')
                            ->get();
        }
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

    public static function getCategoria(string $categoria): Collection
    {
        $categorias = Category::where('name', 'like', "%{$categoria}%")
                                ->orderBy('name', 'ASC')
                                ->get();
        return $categorias;
    }
}