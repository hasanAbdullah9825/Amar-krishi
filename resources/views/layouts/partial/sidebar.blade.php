   <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">ক্যাটাগরি</h5>
          <div class="card-body">
            <div class="row">
                @foreach ($categories as $category )
      <div class="col-6"><a href="{{route('categorywisePost',$category->id)}}">{{$category->name}}</a></div>
           
       @endforeach
             
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>
