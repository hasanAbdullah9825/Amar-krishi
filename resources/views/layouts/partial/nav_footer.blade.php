<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>আমার কৃষি</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('welcome/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('welcome/css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" >
    <div class="container">
      <a class="navbar-brand" href="#">আমার কৃষি</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item  ">
            <a class="nav-link  text-white" href="#">তথ্য কোষ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">আলোচনা</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">আমাদের সম্পর্কে</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">বিশেষজ্ঞের পরামর্শ</a>
          </li>

         @auth
         <li class="nav-item">
          <a class="nav-link text-white" href="{{route('admin.dashboard')}}">ড্যাশবোর্ড</a>
        </li>
         @else
         <li class="nav-item dropdown bg-success ">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            আমার একাউন্ট
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="{{route('login')}}">লগিন</a>
            <a class="dropdown-item " href="{{route('register')}}">রেজিস্ট্রশন</a>
           
        </li>
         @endauth

         
        </ul>
      </div>
    </div>
  </nav>

    @yield('content')
  


 

  <!-- Footer -->
  <footer class="py-5 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; আমার কৃষি</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('welcome/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('welcome/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
