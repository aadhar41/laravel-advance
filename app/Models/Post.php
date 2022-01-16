<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function allPosts()
    {
        return $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(7);
    }

    public function image()
    {
        return $this->morphOne(Image::class, "imageable");
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, "commentable");
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, "taggable");
    }
}
