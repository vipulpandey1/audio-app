<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- loader-->
  <link href="{{ asset('assets-front/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{ asset('assets-front/js/pace.min.js')}}"></script>

  <!-- CSS files -->
  <link href="{{ asset('assets-front/css/bootstrap.min.css ')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Plugins -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/plugins/slick/slick.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets-front/plugins/slick/slick-theme.css')}}" />

  <link href="{{ asset('assets-front/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('assets-front/css/dark-theme.css')}}" rel="stylesheet">
  <link href="{{ asset('assets-front/css/theme-colors.css')}}" rel="stylesheet">
  <link href="{{ asset('assets-front/css/bookblock.css')}}" rel="stylesheet">
  <link href="{{ asset('assets-front/css/perfect-scrollbar.custom.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400&display=swap" rel="stylesheet">
  <title>Suno Kahaniyan</title>
  <style>
    button:active {
outline: none !important;
border: none !important;

}

button:focus {outline:0 !important;    box-shadow: inherit !important;}
  </style>
</head>
<body>

@include('includes/frontend/header')




<!--start page content-->
<div class="page-content">
  @yield('content')
</div>
  @include('includes/frontend/footer')


 

   <!-- JavaScript files -->
   <script src="{{ asset('assets-front/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets-front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-front/js/modernizr.custom.js') }}"></script>
 <script src="{{ asset('assets-front/js/jquery.bookblock.js') }}"></script>
  <script src="{{ asset('assets-front/js/perfect-scrollbar.jquery.min.js') }}"></script>
  
   
   <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
   <script src="{{ asset('assets-front/js/main.js') }}"></script>
   <script src="{{ asset('assets-front/js/index.js') }}"></script>
      
@yield('scripts')
@if(empty(Auth::guard('user')->user()))
<script>
//alert(localStorage.getItem("mycurrentTime"));
 localStorage.removeItem("mycurrentTime");
 localStorage.removeItem("myendTime");
</script>
@endif
</body>

</html>