<!DOCTYPE html>
<html>
<head>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('public/uploads/images/icon.jpg') }}" type="image/x-icon">
  <meta name="description" content="">
  <title>Page 1</title>
  <link rel="stylesheet" href="{{ asset('public/asset/web/assets/mobirise-icons/mobirise-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/tether/tether.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/bootstrap/css/bootstrap-reboot.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/dropdown/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/socicon/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/theme/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/asset/mobirise/css/mbr-additional.css') }}" type="text/css">


@yield('style')
</head>
<body>

<section class="menu cid-qwcsDU8Yc0" once="menu" id="menu1-h" data-rv-view="30">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger text-black">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>
        </button>

        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#">
                         <img src="{{asset('public/uploads/images/camschool.jpg')}}" alt="Videos Tutorial" media-simple="true" style="height: 3.8rem;">
                    </a>
                </span>                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{url('')}}">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home
                    </a>
                </li>


<li class="nav-item dropdown open">
<a class="nav-link link dropdown-toggle text-white display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
<span class="mbri-video-play mbr-iconfont mbr-iconfont-btn"></span>
                       Videos Tutorial 
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item text-white display-4" href="#">
                    Category 1</a>
                     <hr style="padding: 0px;margin: 0px;">
                    <a class="dropdown-item text-white display-4" href="#">
                  Category 2</a>
                    </div>
                    </li>

                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="{{url('contact')}}">
                        <span class="mbri-help mbr-iconfont mbr-iconfont-btn"></span>
                        Contact Us
                    </a>
                </li>

                <li class="nav-item dropdown open">
                <a class="nav-link link dropdown-toggle text-white display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">
                <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                       Account
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item text-white display-4" href="{{url('customer.signin')}}">
                    Login Account</a>
                <hr style="padding: 0px;margin: 0px;">
                    <a class="dropdown-item text-white display-4" href="{{url('customer.signup')}}">
                  Create Account</a>
                    </div>
                    </li>                      
              
            </ul>

        </div>

        <div  class="language-class">
        <a href="{{url('locale?locale=kh')}}"><img src="{{ asset('public/uploads/flags/kh.png') }}"> Khmer</a> 
        <a href="{{url('locale?locale=en')}}"><img src="{{ asset('public/uploads/flags/us.png') }}"> English</a>
  </div>
    </nav>
    
</section>

       
@yield('content')

<section class="cid-qwcsE0gn1m" id="footer1-j" data-rv-view="35" style="padding-top: 30px;">

    <div class="container">
        <div class="media-container-row content text-white">       
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    1234 Street Name
                    <br>City, AA 99999
                </p>
            </div>
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: support@mobirise.com
                    <br>Phone: +1 (0) 000 0000 001
                    <br>Fax: +1 (0) 000 0000 002
                </p>
            </div>
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Links
                </h5>
                <p class="mbr-text">
                    <a class="text-primary" href="#">
                      <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Facebook</a>                      
                    <br><a class="text-primary" href="#">
                      <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Youtube</a>
                    
                     <br> <a class="text-primary" href="#">
                      <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Twitter</a>
                      <br> <a class="text-primary" href="#">
                      <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Google</a>
                </p>
            </div>
        </div>
        <div class="footer-lower">            
            <div class="media-container-row mbr-black">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2017 Videos Tutorial - All Rights Reserved 
                    </p>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <p class="mbr-text mbr-fonts-style display-7">
                        Develop By Cam-App Technology
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="{{ asset('public/asset/web/assets/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/asset/popper/popper.min.js') }}"></script>
  <script src="{{ asset('public/asset/tether/tether.min.js') }}"></script>
  <script src="{{ asset('public/asset/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/asset/smooth-scroll/smooth-scroll.js') }}"></script>
  <script src="{{ asset('public/asset/dropdown/js/script.min.js') }}"></script>
  <script src="{{ asset('public/asset/touch-swipe/jquery.touch-swipe.min.js') }}"></script>
  <script src="{{ asset('public/asset/theme/js/script.js') }}"></script>
  
@yield('script')
  

    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbri-down mbr-iconfont"></i></a></div>
 <!-- <input name="animation" type="hidden"> -->
</body>
</html>