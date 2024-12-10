<?php
// app/Http/Controllers/CommentController.php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $postId; // Associar o comentário ao post
        $comment->save();

        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }
}