<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
                'image' => 'required|string',
                'category' => 'required|exists:categories,id',
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image,
            ]);

            return redirect()->route('welcome')->with('success', 'Tópico criado com sucesso!');
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
    public function updateTopic(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('routeListTopicById', [$topic->id])
            ->with('message-success', 'Atualizado com sucesso');
    }

    /**
     * Remove o tópico especificado.
     */
    public function deleteTopic($id)
    {
        Topic::findOrFail($id)->delete();
        return redirect()->route('topics.listAllTopics')->with('message-success', 'Tópico excluído com sucesso');
    }
}
