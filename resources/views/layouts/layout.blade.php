<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Admin Tasks</title>

  <link rel="shortcut icon" href="{{ asset('public/uploads/images/icon.jpg') }}" type="image/x-icon">

    <!-- Styles -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800"/>  


<script src="{{ asset('public/assets/dojo/js/help.js') }}" ></script>
 <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dojo/js/dojo-1.6.1/dijit/themes/soria/soria.css') }}"/> 
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dojo/js/dojo-1.6.1/dojox/widget/Toaster/Toaster.css') }}"/>

   <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/dojo/js/dojo-1.6.1/dojox/grid/resources/tundraGrid.css') }}"/> 
 
  <script src="{{ asset('public/assets/dojo/js/dojo-1.6.1/dojo/dojo.js') }}"  djConfig="isDebug: true,parseOnLoad: true"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/non-responsive.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/font-awesome.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}"/>


<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>


  
   
   @yield('script')
   @yield('stylesheet')
</head>
<body class="soria">

<div class="col-xs-12" id="header-menu"> 
@include('layouts.menu_header') 
</div>
 </div> 
 </div>
    <div class="col-xs-12">        
         @yield('content')     
    </div>
       <script src="{{ asset('public/assets/js/script.js') }}"></script>
    
</body>
</html>
