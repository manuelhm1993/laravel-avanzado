<?php

namespace App\Http\Controllers;

use App\Utilities\Common;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $categorias = Common::listarCategorias();
        $productos = Common::listarProductos();

        return view('home', compact('categorias', 'productos'));
    }
}
