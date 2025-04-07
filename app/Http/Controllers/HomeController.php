<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $categorias = Category::orderBy('name', 'ASC')->get();
        $productos = Product::with('category')
                            ->orderBy('category_id', 'DESC')
                            ->orderBy('name', 'ASC')
                            ->get();

        return view('home', compact('categorias', 'productos'));
    }
}
