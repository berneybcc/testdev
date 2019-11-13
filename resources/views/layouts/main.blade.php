<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Developer BCC | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Theme CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Nav -->
    @section('nav')
        @include('layouts.nav',['info'=>$info])
    @show
    <!-- Header -->
    @section('header')
    @show

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @section('footer')
        @include('layouts.footer')
    @show
   
    <!-- Modal -->
    @section('modal')
        @include('layouts.modal')
    @show

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('fancybox/jquery.fancybox.pack.js')}}"></script> -->
</body>
</html>
