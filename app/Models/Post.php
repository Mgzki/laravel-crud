<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //"hey laravel, let me mass asign title and content"
    protected $fillable = [
        'title', 'content'
    ];
}
