<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\str;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $post = Post::latest()->paginate(2);
        } else {
            $post = auth()->user()->posts()->latest()->paginate(10);
        }


        return view('admin.post.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)

    {
        $image = $request->file('image');
        $currentDate = Carbon::now()->toDateString();
        $imageName = $request->title . $currentDate . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }

        $postImage = Image::make($image)->resize(750, 300)->stream();
        Storage::disk('public')->put('post/' . $imageName, $postImage);


        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'user_id' => auth()->user()->id,
            'image' => $imageName,
            'category_id' => $request->category

        ]);
        session()->flash('successMessage', 'Post is created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('admin.post.show')->with('post',$post)->with('categories',Category::all());

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)

    {
        $data=$request->only(['title','content','published_at','category']);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $currentDate=Carbon::now()->toDateString();
            $imageName = $request->title . $currentDate . uniqid() . '.' . $image->getClientOriginalExtension();
            $postImage=Image::make($image)->resize(750,300)->stream();
            
            Storage::disk('public')->delete('post/'.$post->image);
            Storage::disk('public')->put('post/'.$imageName,$postImage);
           
            $data['image']=$imageName;
            
        }

       
        
        $post->update($data);

        session()->flash('successMessage', 'Post is Edited successfully');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('successMessage', 'প্রবন্ধটি ডিলিট হয়েছে');
        return redirect(route('admin.post.index'));
    }
}
