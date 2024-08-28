<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'rate',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function users()
    {
        return $this->belongsTo(Post::class);
    }

}
