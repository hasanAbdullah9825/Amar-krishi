@extends('layouts.admin.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
          <!-- Blog Post -->
          <div class="card mb-4 " style="width: 50rem;">
            <img class="card-img-top"  src="{{asset('storage/post/'.$post->image)}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{!!str_limit($post->content,200)!!}</p>
              <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
              <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-secondary">Edit</a>
              <a href="#" class="btn btn-danger">Delete </a>
            </div>
            <div class="card-footer text-muted">
            
              Posted on {{date("g:i a", strtotime($post->created_at))}} by
              <a href="#">{{$post->user->name}}</a>
            </div>
          </div>
          @endforeach
  {{-- {{$posts->links()}} --}}
        </div>
    </div>
</div>
@endsection