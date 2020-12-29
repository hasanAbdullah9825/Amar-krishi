@extends('layouts.admin.dashboard')
@section('content')


    <div class="row">
        <div class="container">
            <h2 class="text-center">সকল ব্যাবহার কারি</h2>
            
            <table class="table-responsive">
                <table class="table table-bordered table-hover  ">
                    <thead>

                        <tr>
                            <th>নাম</th>
                            <th>ইমেইল</th>
                         
                            <th></th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>
                                @if(!$user->isAdmin())
                                <td>
                                    <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-success" type="submit">Mark As Admin</button>
                                    </form>
                                </td>
                                @else
                                <td></td>
                                @endif
                               
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </table>

        </div>
    </div>
@endsection
