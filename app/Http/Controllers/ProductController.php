<?php

namespace App\Http\Controllers;

use App\Utilities\Common;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(?string $categoria = null): View
    {
        $productos = Common::getProductos($categoria);

        return view('productos', compact('productos'));
    }
}
