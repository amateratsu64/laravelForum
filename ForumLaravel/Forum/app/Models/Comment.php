<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Post
{
    use HasFactory;

    protected $fillable = [
        'content',
        'topic_id', // Adicione o campo topic_id
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}