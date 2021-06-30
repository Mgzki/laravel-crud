<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //"hey laravel, let me mass asign title and content"
    protected $fillable = 
    [
        'title', 'content', 'slug', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
