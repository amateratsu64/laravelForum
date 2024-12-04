<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagContrler extends Controller
{
    /**
     * Lista todas as tags.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Exibe o formulário para criar uma nova tag.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Armazena uma nova tag.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
        ]);

        Tag::create($validated);

        return redirect()->route('tags.index')->with('success', 'Tag criada com sucesso!');
    }

    /**
     * Exibe o formulário para editar uma tag.
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Atualiza uma tag existente.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:100',
        ]);

        $tag->update($validated);

        return redirect()->route('tags.index')->with('success', 'Tag atualizada com sucesso!');
    }

    /**
     * Remove uma tag.
     */
    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect()->route('tags.index')->with('success', 'Tag excluída com sucesso!');
    }
}
