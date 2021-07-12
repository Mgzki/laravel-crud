<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //"hey laravel, let me mass asign title and content"
    // protected $fillable = 
    // [
    //     'title', 'content', 'slug', 'category_id'
    // ];
    protected $guarded = [];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where(fn($query) =>
                $query->where('title','like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            //give me the posts where they have a category. specifically the ones that matches what the user requested
            $query
                ->whereHas('category', fn ($query) => 
                    $query->where('slug', $category)
                );
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            //give me the posts where they have a category. specifically the ones that matches what the user requested
            $query
                ->whereHas('author', fn ($query) => 
                    $query->where('username', $author)
                );
        });
        // if ($filters['search'] ?? false){
        //     $query
        //         ->where('title','like', '%' . request('search') . '%')
        //         ->orWhere('content', 'like', '%' . request('search') . '%');
        // }

    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // user_id is the foreign key, otherwise laravel things it's author_id
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id is the foreign key, otherwise laravel things it's author_id
    }
}
