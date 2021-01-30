<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post ,CreateCommentRequest $request){
     Comment::create(['user_id'=>auth()->user()->id,

     'content'=>$request->content,
     'post_id'=>$post->id]);

     return view('post-show')->with('post', $post)->with('categories', Category::all())->with('comments',$post->comments->get());

}
}