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
    public function __invoke(Request $request): View
    {
        $categorias = Common::getCategorias();
        $productos = Common::getProductos();

        return view('home', compact('productos', 'categorias'));
    }
}
