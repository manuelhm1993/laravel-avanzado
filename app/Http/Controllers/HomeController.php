<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categorias = Category::all();

        return view('home', compact('categorias'));
    }
}
