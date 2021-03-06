<!DOCTYPE html>
<html>
<head>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="{{ asset('public/uploads/images/icon.jpg') }}" type="image/x-icon">
  <meta name="description" content="Video Tutorial">

  @yield('meta')

  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('public/asset/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/socicon/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/mobirise/css/mbr-additional.css') }}" type="text/css">
  <script src="{{ asset('public/asset/web/assets/jquery/jquery.min.js') }}"></script>
  
@yield('style')

</head>
<body>

       
@yield('content')

@include('layouts/footer')


  <script src="{{ asset('public/asset/popper/popper.min.js') }}"></script>
  <script src="{{ asset('public/asset/tether/tether.min.js') }}"></script>
  <script src="{{ asset('public/asset/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/asset/smooth-scroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('public/asset/dropdown/js/script.min.js') }}"></script>
  <script src="{{ asset('public/asset/touch-swipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('public/asset/theme/js/script.js') }}"></script>
  
@yield('script')
@yield('script2')
  

    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbri-down mbr-iconfont"></i></a></div>
 <!-- <input name="animation" type="hidden"> -->
</body>
</html>