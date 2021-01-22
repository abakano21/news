<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'short_description', 'full_description'];

    public function path()
    {
        return route('posts.show', $this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
