@extends('layouts/master_layout_site')

@section('title')
Register
@endsection


@section('content')


<section class="mbr-fullscreen mbr-parallax-background" id="header15-13" style="background-image: url({{asset('public/uploads/images/engineering_background.jpg')}});" data-rv-view="81">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>

    <div class="container align-left">
<div class="row">
    <div class="mbr-white col-lg-8 col-md-7 content-container">
     
    </div>
    <div class="col-lg-4 col-md-5">

           @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul style="margin-bottom:0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
            @endif

    <div class="form-container">
        <div class="media-container-column" data-form-type="formoid">
           <h4 class="display-5" style="color: white;">User Register</h4>
            <form class="mbr-form" action="{{url('customer/register')}}" method="post" data-form-title="Mobirise Form">
            {{ csrf_field() }}
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="username" data-form-field="username" placeholder="Username" required="" id="name-header15-13">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" class="form-control px-3" name="password" data-form-field="Email" placeholder="Password" required="" id="email-header15-13">
                    </div>
                </div>

                   <div data-for="email">
                    <div class="form-group">
                        <input type="email" class="form-control px-3" name="email" data-form-field="email" placeholder="E-mail" required="" id="email-header15-13">
                    </div>
                </div>

                   <div data-for="phone">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="phone" data-form-field="phone" placeholder="Phone" id="email-header15-13">
                    </div>
                </div>               
                
                   <div data-for="phone">
                    <div class="form-group">
                        <span class="input-group-btn"><button type="submit" class="btn btn-xs btn-primary display-4" style="cursor: pointer;"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Register</button>  <a href="{{url('customer/login')}}" class="btn btn-xs btn-primary display-4" style="margin-left: 10px;border-radius: 100px !important; padding: 0.5rem 2rem;cursor: pointer;"><span class="mbri-lock mbr-iconfont mbr-iconfont-btn"></span>Login</a></span>
                   
                </div>    
               
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
   
</section>


@endsection