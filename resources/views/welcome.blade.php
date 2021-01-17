
@extends('layouts.partial.nav_footer')
@section( 'content')
<!-- Page Content -->

  {{-- <div class="container-fluid" >
      <div>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 " src="{{asset('welcome/img/agri.jpg')}}" alt="First slide" style="height:50%">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
              </div>
            </div>
          </div>
      </div>
  </div> --}}
 

<div class="container">
    
    
    <div class="row">

 
        <!-- Blog Entries Column -->
        <div class="col-md-8">
  
          <h1 class="my-4">এক নজরে দেখুন
            <small>..................</small>
          </h1>
  
          @foreach($posts as $post)
          <!-- Blog Post -->
          <div class="card mb-4 ">
            <img class="card-img-top" src="{{asset('storage/post/'.$post->image)}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text"> 
                 

                  {{str_limit(strip_tags($post->content),200)}}
              </p>
              <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">বিস্তারিত &rarr;</a>
            </div> 
            <div class="card-footer text-muted">
              Posted on {{$post->created_at}},  by
              <a href="#">{{$post->user->name}}</a>
            </div>
          </div>
          @endforeach
  
          {{ $posts->links() }}
          <!-- Pagination -->
          {{-- <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul> --}}
  
        </div>
  
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
  
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">কিছু খুজতেছেন?</h5>
            <div class="card-body">
              <form action="{{route('welcome')}}" method="GET">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="" name="search">
                <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">খুঁজুন

                  </button>
                </span>
              </div>
              </form>
            </div>
          </div>
  
          {{-- <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div> --}}

          @include('layouts.partial.sidebar')
  
        </div>
  
      </div>
      <!-- /.row -->

  </div>
  

@endsection