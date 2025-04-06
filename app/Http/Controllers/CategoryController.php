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
        $categorias = Category::all();

        return view('categorias', compact('categorias'));
    }

    public function create($nombreCategoria): RedirectResponse
    {
        $category = new Category();
        $category->name = $nombreCategoria;
        $category->save();

        $categorias = Category::all();

        return redirect()->route('home', compact('categorias'));
    }

    public function show($categoria): View
    {
        $categorias = Category::where('name', 'like', "%{$categoria}%")->get();

        return view('categorias', compact('categorias'));
    }
}
