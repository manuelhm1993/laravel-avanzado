<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utilities\Common;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $order = [
            'field' => 'id',
            'order' => 'DESC',
        ];
        $categorias = Common::listarCategorias(order:$order);

        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
        ]);

        $categoria = Category::create($validated);

        return to_route('admin.categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoria): View
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categoria): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'string|required|max:255',
        ]);

        $categoria->update($validated);

        return to_route('admin.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria): RedirectResponse
    {
        $categoria->delete();
        return to_route('admin.categorias.index');
    }
}
