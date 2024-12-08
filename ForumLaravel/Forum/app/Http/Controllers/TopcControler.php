<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;

class TopcControler extends Controller
{
    /**
     * Lista todos os tópicos.
     */
    public function listAllTopics()
    {
        $topics = Topic::with('post')->get();
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    /**
     * Exibe o formulário de criação de tópico ou salva um novo tópico.
     */
    public function createTopic(Request $request)
    {
        if ($request->isMethod('GET')) {
            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|integer',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category' => 'required|exists:categories,id',
            ]);

            // Criar o tópico
            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category,
            ]);

            // Criar o post relacionado, incluindo imagem se fornecida
            $data = [
                'user_id' => Auth::id(),
            ];

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('topics', 'public');
                $data['image'] = $path;
            }

            

            return redirect()->route('topics.listAllTopics')->with('success', 'Tópico criado com sucesso!');
        }
    }

    /**
     * Exibe os detalhes de um tópico específico.
     */
    public function listTopicById($id)
    {
        $topic = Topic::with('post')->findOrFail($id);
        return view('topics.viewTopic', ['topic' => $topic]);
    }

    /**
     * Atualiza as informações de um tópico.
     */
    public function editAndUpdateTopic(Request $request, $id)
    {
        $topic = Topic::with('post')->findOrFail($id);
        $categories = Category::all();

        if ($request->isMethod('GET')) {
            return view('topics.editTopic', [
                'topic' => $topic,
                'categories' => $categories,
            ]);
        } elseif ($request->isMethod('PUT')) {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|integer',
                'category_id' => 'required|exists:categories,id',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Atualizar os dados do tópico
            $topic->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category_id,
            ]);

            // Atualizar a imagem, se fornecida
            if ($request->hasFile('photo')) {
                // Excluir imagem antiga, se houver
                if ($topic->post->image) {
                    Storage::delete('public/' . $topic->post->image);
                }

                $path = $request->file('photo')->store('topics', 'public');
                $topic->post->update(['image' => $path]);
            }

            return redirect()->route('topics.listAllTopics')
                             ->with('success', 'Tópico atualizado com sucesso!');
        }

        return abort(405); // Método não permitido
    }

    /**
     * Remove o tópico especificado.
     */
    public function deleteTopic($id)
    {
        $topic = Topic::findOrFail($id);

        // Excluir imagem associada
        if ($topic->post && $topic->post->image) {
            Storage::delete('public/' . $topic->post->image);
        }

        $topic->delete();
        return redirect()->route('topics.listAllTopics')->with('success', 'Tópico excluído com sucesso');
    }
}
