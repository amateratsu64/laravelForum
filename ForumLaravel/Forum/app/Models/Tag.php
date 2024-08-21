<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class, 'topic_tag');
    }
}
