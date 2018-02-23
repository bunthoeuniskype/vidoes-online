@extends('Site::layouts/main')

@section('title')
Login
@endsection


@section('content')


<section class="mbr-fullscreen mbr-parallax-background" id="header15-13" style="background-image: url({{asset('public/uploads/images/engineering_background.jpg')}});" data-rv-view="81">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>

    <div class="container">
<div class="row">
    <div class="col-12 col-lg-6"></div>    
    <div class="col-12 col-lg-6">
    
     @if(Session::has('failed'))
                        <div class="alert alert-warning">
                        <em>{!! Session('failed') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
     @endif

                  @if(Session::has('success'))
                        <div class="alert alert-success">
                        <em>{!! Session('success') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
                @endif
    <div class="form-container">
             
        <div class="media-container-column" data-form-type="formoid">
           <h4 class="display-5" style="color: white;">User Login</h4>
            <form class="mbr-form" action="{{url('customer/login')}}" method="post" data-form-title="Mobirise Form">
            {{ csrf_field() }}
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="username" data-form-field="username" placeholder="Username" trim=true required="" id="name-header15-13">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" trim=true class="form-control px-3" name="password" data-form-field="Email" placeholder="Password" required="" id="email-header15-13">
                    </div>
                </div>
                
                
                <span class="input-group-btn">
                  <span class="input-group-btn"><button type="submit" class="btn btn-xs btn-primary display-4" style="cursor: pointer;"><span class="mbri-lock mbr-iconfont mbr-iconfont-btn"></span>Loign</button>  <a href="{{url('customer/register')}}" class="btn btn-xs btn-primary display-4" style="margin-left: 10px;border-radius: 100px !important; padding: 0.5rem 2rem;cursor: pointer;"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Register</a></span>
                </span> 
            </form>
        </div>
    </div>
    </div>
</div>
    </div>
   
</section>

@endsection