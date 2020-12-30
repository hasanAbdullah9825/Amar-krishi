@extends('layouts.admin.dashboard')

@section('content')
    <div class="card card-default">
        <div class="card-header">



        </div>
        <div class="card-body">


            <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name ?? '') }}">

                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">ক্যাটাগরি আপডেট করুন</button>
                </div>

            </form>
        </div>
    </div>

@endsection
