@extends('layouts.admin.dashboard')

@section('content')

        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                   
                    
                    </div>
                    <div class="card-body">
                        
                       
                    <form action="{{route('admin.categories.store')}}" method="POST" >
                        @csrf
                      
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="">
                    
                            </div>
                            <div class="form-group">
                            <button class="btn btn-success" type="submit">নতুন ক্যাটাগরি তৈরি করুন</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
              </div>
            
          </div>
        </div>
               
    
@endsection