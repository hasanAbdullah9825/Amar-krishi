@extends('layouts.admin.dashboard')
@section('content')
    <div class="container">
        <div class="row">

            <table class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-dark">
                            <th>ক্যাটাগরির নাম</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="text-dark">
                                <td>{{ $category->name }}</td>
                                {{-- <td> <a href="{{route('admin.categories.destroy',$category->id)}}"><i class="fas fa-trash"></i></a></td> --}}
                                 <td>
                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

                                    </form>
                                 </td>
                                <td><a href="{{route('admin.categories.edit',$category->id)}}"><i class="fas fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </table>

        </div>
    </div>

@endsection
