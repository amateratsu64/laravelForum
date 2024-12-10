<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Comment;
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
    
        // Criar o post relacionado
        $post = new Post();
        $post->user_id = Auth::id();
        $topic->post()->save($post);
    
        return redirect()->route('topics.listAllTopics')->with('success', 'Tópico criado com sucesso!');
    }

    public function storeComment(Request $request, $topicId)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    $comment = new Comment();
    $comment->content = $request->content;
    $comment->topic_id = $topicId; // Associar o comentário ao tópico
    $comment->post_id = $request->post_id; // Associar o comentário ao post
    $comment->save();

    return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
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
