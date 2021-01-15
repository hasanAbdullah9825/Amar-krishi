@extends('layouts.admin.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <!-- Blog Post -->
                    <div class="card mb-4 " style="width: 50rem;">
                        <img class="card-img-top" src="{{ asset('storage/post/' . $post->image) }}" alt="Card image cap">
                        <div class="card-body">

                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{!! str_limit($post->content, 200) !!}</p>

                            <div class="row mb-3">
                                <div class="col-md-6 ">
                                    <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-success btn-sm">Details</a>
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>

                                </div>
                                <div class="col-md-6 float-right">
                                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="float-right btn btn-danger btn-sm" type="submit">Delete</button>

                                    </form>
                                </div>
                            </div>

                            {{-- <div class="d-flex justify-content-between">
                                <div><a href="{{ route('admin.post.show', $post->id) }}" class=""><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                                         <a href="{{ route('admin.post.edit', $post->id) }}" class=""><i
                                    class="fas fa-edit"></i></a></div>
                                <div> <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="float-right " type="submit"><i sty class="far fa-trash-alt"></i></button>

                                </form></div>
                            </div> --}}
                        </div>

                        <div class="card-footer text-muted">

                            Posted on{{ date('g:i a', strtotime($post->created_at)) }}
                            {{ $post->created_at->toDateString() }} by
                            <a href="#">{{ $post->user->name }}</a>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
