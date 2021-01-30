<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function index()
  {
    //dd(request()->query('search'));
    return view('welcome')->with('posts', Post::published()->searched()->latest()->paginate(3))->with('categories', Category::all());
  }

  public function show(Post $post)
  {
    return view('post-show')->with('post', $post)->with('categories', Category::all())->with('comments',$post->comments);;
   
  }
  public function categorywisePost(Category $category){
    return view('welcome')->with('posts', $category->posts()->published()->searched()->latest()->paginate(3))->with('categories', Category::all());

  }
}
