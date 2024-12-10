<?php
// app/Models/Comment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'topic_id', // Se você também estiver ligando a comentários a tópicos
        'post_id', // Adicione esta linha
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}