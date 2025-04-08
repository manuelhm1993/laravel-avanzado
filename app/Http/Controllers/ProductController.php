<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Utilities\Common;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $categoria = $request->query('categoria');
        $productos = (!is_null($categoria)) ? Common::listarProductosCategoria($categoria) : Common::listarProductos(true);

        return view('productos.index', compact('productos'));
    }

    public function create(string $nombreProducto, Category $category): RedirectResponse
    {
        $product = new Product();
        $product->name = $nombreProducto;
        $product->category_id = $category->id;
        $product->save();

        return redirect()->route('productos.index');
    }

    public function show(Product $producto): View
    {
        return view('productos.show', compact('producto'));
    }
}
