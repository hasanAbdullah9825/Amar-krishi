<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    protected $fillable=['user_id','content','post_id'];

    public function post(){

        return $this->belongsTo(Post::class);
    }
    public function user(){

        return $this->belongsTo(user::class);
    }
}
