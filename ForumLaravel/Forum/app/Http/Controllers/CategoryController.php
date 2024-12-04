<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Lista todas as categorias.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Exibe o formulário para criar uma nova categoria.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Armazena uma nova categoria.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Exibe o formulário para editar uma categoria.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Atualiza uma categoria existente.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove uma categoria.
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
