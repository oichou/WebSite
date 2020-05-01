<!doctype html>
<html lang="en">
<head>
    <title>Oussafa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/boxicons.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/header.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/styles/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/categories.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/categories_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/contact_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/cart_responsive.css') }}"> -->

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('/styles/bootstrap4/bootstrap.min.css')}}"> -->
    @yield('extra-css')
</head>
<body>

      <main class="py-4">
        @yield('header')
          @yield('content')
          @yield('footer')
      </main>
      @yield('extra-js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
      <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
      <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
      <!-- <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script> -->
      <script src="{{ asset('/css/bootstrap4/popper.js') }}"></script>
      <script src="{{ asset('/css/bootstrap4/bootstrap.min.js') }}"></script>
      <script src="{{ asset('/plugins/greensock/TweenMax.min.js') }}"></script>
      <script src="{{ asset('/plugins/greensock/TimelineMax.min.js') }}"></script>
      <script src="{{ asset('/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
      <script src="{{ asset('/plugins/greensock/animation.gsap.min.js') }}"></script>
      <script src="{{ asset('/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
      <script src="{{ asset('/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
      <script src="{{ asset('/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('/plugins/easing/easing.js') }}"></script>
      <script src="{{ asset('/plugins/parallax-js-master/parallax.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('/js/custom.js')}}"></script>
      <script src="{{ asset('js/product.js') }}"></script>
      <script src="{{ asset('js/checkout.js') }}"></script>
      <script src="{{ asset('js/categories.js') }}"></script>
      <script src="{{ asset('js/cart.js') }}"></script>
      <script src="{{ asset('js/profile.js') }}"></script>
      <script src="{{ asset('js/contact.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
      </script>
</body>
</html>
