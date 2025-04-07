<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $productos = Product::all();

        return view('productos', compact('productos'));
    }

    public function create(string $nombreProducto, Category $category): RedirectResponse
    {
        $product = new Product();
        $product->name = $nombreProducto;
        $product->category_id = $category->id;
        $product->save();

        $productos = Product::all();

        return redirect()->route('productos.index', compact('productos'));
    }

    public function show(string $categoria): View
    {
        $category = Category::where('name', 'like', "%{$categoria}%")->first();
        $productos = [];

        if(!is_null($category))
        {
            $productos = Product::where('category_id', $category->id)->get();
        }

        return view('productos', compact('productos'));
    }
}
