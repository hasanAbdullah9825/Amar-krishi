@extends('layouts.admin.dashboard')
@section('content')
    <div class="container">
        <div class="row">

            <table class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ক্যাটাগরি নাম</th>
                            <th>  </th>
                            <th>   </th>
                        </tr>
                    </thead>
                    <tbody>
@foreach($categories as $category)
<tr>
    <td>{{$category->name}}</td>
    <td> <a href=""><i class="fas fa-trash"></i></a></td>
    <td><a href=""><i class="fas fa-edit"></i></a></td>
</tr>
@endforeach
                    </tbody>
                </table>
            </table>

        </div>
    </div>

@endsection
