<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo'
    ];
    
    public function posttable()
    {
        return $this->morphto();
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rates()
    {
        return $this->hasMany(Post::class);
    }
    
}
