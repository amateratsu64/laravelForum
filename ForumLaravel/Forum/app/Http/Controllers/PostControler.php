<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostControler extends Controller
{
    /**
     * Lista todos os posts.
     */
    public function index()
    {
        $posts = Post::with('postable')->get(); // Carrega os posts com o relacionamento polimórfico
        return view('posts.index', compact('posts'));
    }

    /**
     * Exibe o formulário para criar um novo post.
     */
    public function create()
    {
        $topics = Topic::all(); // Carrega todos os tópicos para o dropdown
        return view('posts.create', compact('topics'));
    }

    /**
     * Armazena um novo post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $post = new Post();
        $post->user_id = Auth::id(); // Associa o post ao usuário autenticado
        $post->image = $validated['image'] ?? null; // Adiciona a imagem se existir
        $post->postable_type = 'App\Models\Topic'; // Define o tipo do post
        $post->postable_id = $validated['topic_id']; // Associa o post ao tópico
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Exibe o formulário para editar um post existente.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $topics = Topic::all(); // Carrega todos os tópicos para o dropdown
        return view('posts.edit', compact('post', 'topics'));
    }

    /**
     * Atualiza um post existente.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $post->topic_id = $validated['topic_id'];
        if (isset($validated['image'])) {
            $post->image = $validated['image'];
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove um post.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post excluído com sucesso!');
    }
}