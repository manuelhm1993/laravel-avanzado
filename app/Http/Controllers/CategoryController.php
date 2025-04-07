<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categorias = Category::orderBy('name', 'ASC')->get();

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
        $categorias = Category::where('name', 'like', "%{$categoria}%")
                                ->orderBy('name', 'ASC')
                                ->get();

        return view('categorias', compact('categorias'));
    }
}
