@extends('layouts/master_layout_site')

@section('content')


<section class="carousel slide cid-qwcsE0gn1m" data-interval="false" id="slider1-x" data-rv-view="62">

    <div class="full-screen">

    <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="false" data-interval="false">
    <ol class="carousel-indicators">
    <li data-app-prevent-settings="" data-target="#slider1-x" class=" active" data-slide-to="0"></li>
    <li data-app-prevent-settings="" data-target="#slider1-x" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#slider1-x" data-slide-to="2"></li></ol>
    <div class="carousel-inner" role="listbox">

    <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-image: url({{asset('public/uploads/imagesvideo_tutoriales_1.jpg')}});">
    <div class="container container-slide">
    <div class="image_wrapper">
    <div class="mbr-overlay"></div>    
    <img src="{{asset('public/uploads/images/video_tutoriales_1.jpg')}}">
    </div>
    </div>    
    </div>
   
    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url({{asset('public/uploads/images/video_tutoriales_2.jpg')}});">
    <div class="container container-slide">
    <div class="image_wrapper">
    <div class="mbr-overlay"></div>    
    <img src="{{asset('public/uploads/images/video_tutoriales_2.jpg')}}">
    </div>
    </div>    
    </div>

     <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url({{asset('public/uploads/images/video_tutoriales_3.jpg')}});">
    <div class="container container-slide">
    <div class="image_wrapper">
    <div class="mbr-overlay"></div>    
    <img src="{{asset('public/uploads/images/video_tutoriales_3.jpg')}}">
    </div>
    </div>    
    </div>


    <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#slider1-x"><span aria-hidden="true" class="mbri-left mbr-iconfont"></span><span class="sr-only">Previous</span></a><a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#slider1-x"><span aria-hidden="true" class="mbri-right mbr-iconfont"></span><span class="sr-only">Next</span></a></div>

    </div>

</section>



<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="margin-bottom: -75px;">

    <div class="container">
    <div class="container-fluid">
     <h5 style="text-align: left;  padding-left: 15px;">Category 1</h5>
       <div  class="media-container-row">
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                <a href="{{url('videos_detail')}}">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/01.jpg')}}" alt="Videos" media-simple="true">
                    </div></a>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            No Coding
                        </h4>
                       <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/02.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            Mobile Friendly
                        </h4>
                        <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>

            
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper  p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/01.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            No Coding
                        </h4>
                      <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/02.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            Mobile Friendly
                        </h4>
                       <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>       
                
        </div>
         <div class="mbr-section-btn text-center">
         <a class="btn btn-sm btn-secondary-outline display-3" href="#">More Videos</a>
          </div>

<hr>
         <h5 style="text-align: left;  padding-left: 15px;">Category 2</h5>
        <div  class="media-container-row">
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/01.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            No Coding
                        </h4>
                       <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/02.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            Mobile Friendly
                        </h4>
                        <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>

            
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper  p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/01.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            No Coding
                        </h4>
                      <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{asset('public/uploads/images/02.jpg')}}" alt="Videos" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media">
                            Mobile Friendly
                        </h4>
                       <p class="font-media-desc">
                           You might already have books or classroom lessons, but having a variety of materials is good.
                        </p>
                    </div>
                </div>
            </div>       
                
        </div>

        <div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="#">More Videos</a>
          </div>
    </div>

    </div>
</section>


@endsection