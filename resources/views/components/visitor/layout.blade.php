<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- External Files Linking -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous" />

  <!-- Internal Files Linking -->
  <link rel="stylesheet" href="{{asset('theme_asset/dash/css/dashboard.css')}}" />
  <link rel="icon" type="image" href="{{asset('theme_asset/dash/img/logo3.png')}}">
  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Visitor Panel</title>
</head>

<body>
  <div class="wrapper-parent">
    <!-- Sidebar menu  -->
    <div id="menu" class="menu-wrap hide">
      <!-- Logo -->
      <div>
        <a class="site-name" href="{{route('welcome')}}">
          <div class="logo">
            <img src="{{asset('theme_asset/dash/img/logo.png')}}" alt="" />
          </div>
        </a>
      </div>

      <!-- Navlist -->
      <ul class="insideScroll text-white mt-2">

        <li class="hover">
          <a href="{{route('welcome')}}" class="">
            <i class="fas fa-house-damage icons"></i>
            Overview
          </a>
        </li>

        <li class="hover">
          <a href="{{route('visitor.product.index')}}" class="">
            <i class="fa-solid fa-list icons"></i>
            Products
          </a>
        </li>

        <!-- <li class="hover">
            <a href="{{route('note.create')}}" class="">
              <i class="fa-solid fa-plus"></i>
              Create Product
            </a>
          </li> -->

        <li class="hover">
          <a href="{{route('visitor.category.index')}}" class="">
            <i class="fa-solid fa-list icons"></i>
            Categories
          </a>
        </li>

        <li class="hover">
          <a href="{{route('register')}}" class="">
            <i class="fa-solid fa-user-plus icons"></i>
            Registration
          </a>
        </li>

        <li class="hover">
          <a href="{{route('login')}}" class="">
            <i class="fa-solid fa-right-to-bracket icons"></i>
            Login
          </a>
        </li>

      </ul>
    </div>

    <!-- Responsive Overlay -->
    <div class="responsive-overlay"></div>

    <!-- Main Content Div -->
    <div class="content-wrap">
      <!-- top row -->
      <div class="top-bar sticky-top">
        <div class="container-fluid">
          <div class="row px-3">
            <div class="col-12 bg">
              <div class="row">
                <div class="col-2">
                  <!-- Hamburger icon -->
                  <div id="hideshow" href="#!" class="menu-toggle-btn">
                    <span class="w-75"></span>
                    <span class="w-50"></span>
                    <span></span>
                  </div>

                  <!-- Hamburger icon responsive -->
                  <div id="hideshow" href="#!" class="menu-toggle-btn lg">
                    <span class="w-75"></span>
                    <span class="w-50"></span>
                    <span></span>
                  </div>
                </div>

                <!-- top row cta -->
                <div class="col-10 d-flex justify-content-end align-items-center">
                  <form action="#" class="position-relative">
                    <input type="text" class="form-control-c ps-5" placeholder="Search...">
                    <i class="fa-solid fa-search position-absolute"
                      style="left: 10px; top: 50%; transform: translateY(-50%); color: #094797;"></i>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Dashboard main content section -->
      <div class="main-content">
        <div class="main-content">
          <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
            @endif
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- External JS Linking -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

  <!-- Internal JS Linking -->
  <script src="{{asset('theme_asset/dash/js/dash.js')}}"></script>
  <script src="{{asset('theme_asset/dash/js/sweetalert.js')}}"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>

</html>