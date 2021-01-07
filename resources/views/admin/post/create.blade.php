@extends('layouts.admin.dashboard')




@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="">
                        </div>


                        <div class="form-group">
                            <label for="content">Content</label>

                            <input id="x" type="hidden" name="content">
                            <trix-editor input="x"></trix-editor>

                        </div>
                        <div class="form-group">
                            <label for="published_at">Publishet at</label>
                            <input type="text" name="published_at" class="form-control" id="published_at" value="">
                        </div>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <div class="form-group">
                            <label for="Category">category</label>
                            <select name="category" id="" class="form-control ax1 " >

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>


                        <div class="form-group">
                            <button type="submit" class=" btn btn-success">create post</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>





@endsection



@section('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        })

        // $(document).ready(function() {
        //     $('.ax1').select2();
        // });

    </script>

@endsection
