<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')->with('posts', Post::latest()->paginate(3))->with('categories',Category::all());
    }

    public function show(Post $post){
      return view('post-show')->with('post',$post)->with('categories',Category::all());
        
    }
}
