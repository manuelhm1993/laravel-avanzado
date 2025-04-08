<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Utilities\Common;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categorias = Common::listarCategorias(true);
        return view('categorias', compact('categorias'));
    }

    public function create(string $nombreCategoria): RedirectResponse
    {
        $category = new Category();
        $category->name = $nombreCategoria;
        $category->save();
        return redirect()->route('categorias.index');
    }

    public function show(string $categoria): View
    {
        $categorias = Common::getCategoria($categoria);
        return view('categorias', compact('categorias'));
    }
}
