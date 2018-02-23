
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Videos Tutorial</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.min.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/font-awesome.min.css') }}"/>

    <style>
        body {
            font-family: 'Lato';
        }

     #menu{
   margin-bottom: 25px;
    background-color: #2e128a;
    height: 70px;
    color: #f7f7e1;
    border-bottom: 5px solid #01c33c;
        }

    .panel-default {
    border-color: #01c33c;
}
.form-control{
    border-radius: 0px;
}
        #footer{
    margin-top: 20px;
    width: 100%;
    background-color: #2e128a;      
    background-position: bottom;
    background-position-x: center;
    background-position-y: bottom;
    background-color: #2e128a;
    min-height: 232px;
    color: #f7f7e1;    
    border-top: 3px solid #01c33c; 
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <div class="col-xs-12" id="menu">
        
            <div class="header" style="padding-left: 10px">
                <h2>
                {{ $setting->develop_for_client }}
                  </h2>
                
            </div>

        </div>
 
<div class="col-xs-12">

<div class="col-xs-6">
  <div class="panel panel-default">                
                <div class="panel-body" style="text-align: center;  height: 280px; width: 544px;">
              <img style="max-width: 544px; max-height: 280px; margin-top: 8%; margin-left: 4%" class="img img-response" src="{{ $setting->logo==''?url('public/uploads/images/Ecamschool-Logo.jpg') : url($setting->logo) }}">
              </div>
        </div>
</div>

        <div class="col-xs-6">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-style: italic; font-size: 18px;">Security System Admin Panel</div>
                <div class="panel-body" style="height: 233px;">
               @if(Session::has('failed'))
                        <div class="alert alert-warning">
                        <em>{!! Session('failed') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
                @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('sys_signin') }}" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-xs-4 control-label">E-mail : </label>

                            <div class="col-xs-8">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                              
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-xs-4 control-label">Password :</label>

                            <div class="col-xs-8">
                                <input id="password" type="password" class="form-control" name="password" required>                               
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="language" class="col-xs-4 control-label">Language :</label>

                            <div class="col-xs-8"> 
                                {{ Form::select('locale',['en'=>trans('common.english'),'kh'=>trans('common.khmer')],App::getLocale(),array("class"=>"form-control" ))}}
                             </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                             <button type="submit" style="font-size: 20px; width: 108px;  height: 42px;  margin-right: 2px;" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                 <button type="reset" style="font-size: 20px; width: 108px;  height: 42px; margin-right: 3px;" class="btn btn-default pull-right">
                                  <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                                </button>                               

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>

<div class="col-xs-12" id="footer">

<div class="col-xs-6">
<h3>Develop For : {{ $setting->develop_for_client }}</h3>
<h4>Address : {{ $setting->client_address }}</h4>
<h4>P/H : {{ $setting->client_phone }}</h4>
<h4>E-mail : {{ $setting->client_email }}</h4>
<h4>Website : {{ $setting->client_website }}</h4>
</div>
<div class="col-xs-6">

<h3>Develop by : {{ $setting->develop_by }}</h3>
<h4>Address : {{ $setting->develop_address }}</h4>
<h4>P/H : {{ $setting->develop_phone }}</h4>
<h4>E-mail : {{ $setting->develop_email }}</h4>
<h4>Website : {{ $setting->develop_website }}</h4>
<br>
<h4>&copy; Copyright : {{ $setting->copy_right }}</h4>
</div>

</div>



    <!-- JavaScripts -->
     {{ Html::script('public/assets/js/jquery.js') }}     
    {{ Html::script('public/assets/js/bootstrap.min.js') }}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
