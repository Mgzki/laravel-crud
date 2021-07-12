<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class); // user_id is the foreign key, otherwise laravel things it's author_id
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id is the foreign key, otherwise laravel things it's author_id
    }
}
