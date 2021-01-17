@extends('layouts.user.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <!-- Blog Post -->
                    <div class="card mb-4 ">
                        <img class="card-img-top" src="{{asset('storage/post/'.$post->image)}}" alt="Card image cap">
                        <div class="card-body">
                          <h2 class="card-title">{{$post->title}}</h2>
                          <p class="card-text"> 
                             
            
                              {{str_limit(strip_tags($post->content),200)}}
                          </p>
                          <div class="row mb-3">
                            <div class="col-md-6 ">
                                <a href="{{ route('user.post.show', $post->id) }}" class="btn btn-success btn-sm">Details</a>
                                <a href="{{ route('user.post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>

                            </div>
                            <div class="col-md-6 float-right">
                                <form action="{{ route('user.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="float-right btn btn-danger btn-sm" type="submit">Delete</button>

                                </form>
                            </div>
                        </div>
                        </div> 
                        <div class="card-footer text-muted">
                          Posted on {{$post->created_at}},  by
                          <a href="#">{{$post->user->name}}</a>
                        </div>
                      </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    

@endsection
