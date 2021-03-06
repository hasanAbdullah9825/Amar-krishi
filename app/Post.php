<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image', 'published_at', 'category_id', 'user_id'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query('search') ?? '';
        if (!$search) {
            return $query;
        } else {
            return $query->published()->where('title', 'LIKE', "%{$search}%");
        }
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }
    


    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
