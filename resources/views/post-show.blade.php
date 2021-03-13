@extends('layouts.partial.nav_footer')

@section( 'content')
<div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          লেখকঃ
          <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{date("g:i a",strtotime($post->created_at))}} {{$post->created_at->toDateString()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset('storage/post/'.$post->image)}}" alt="">

        <hr>

       <p >{!!$post->content!!}</p>
        <hr>

        <!-- Comments Form -->
        @auth
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{route('comment.store',$post->id)}}" method="POST">
              @csrf
              <div class="form-group">
                <textarea class="form-control" rows="3" name="content"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        @else
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <div class="d-flex justify-content-between">

              <div class="p-2"><h6>To make a comment please Login</h6></div>
              <div class="p-2"><div class="btn  bg-success">
                <a class="text-white" href="{{route('login')}}">Login</a>
                </div></div>
            </div>
        
          </div>
        </div>
          
        @endauth

        <!-- Single Comment -->
      
        @foreach($comments as $comment)
        <!-- Comment with nested comments -->
        <div class="media mb-4">
         
         <div class="media mt-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">
              {{$comment->user->name}}</h5>
          {{$comment->content}}
          </div>
        </div>
         
        </div>
        @endforeach
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
              <form action="" method="GET">
                  @csrf
                <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>
            </form>
            
          </div>
        </div>
 @include('layouts.partial.sidebar')
     
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection