@extends('layouts/master_layout_site')

@section('title')
Videos Free
@endsection

@section('content')

<section class="cid-qwcsE0gn1m" data-interval="false" data-rv-view="62" style="text-align: center;">
 
</section>
<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="margin-bottom: -75px;">

    <div class="container">

 <div class="row">
  
  <div class="col-lg-9">



<div class="container-fluid">       


        <h5 class="subcategory">Videos Free</h5>


    @foreach($posts->chunk(4) as $post)
         <div  class="media-container-row">
         @foreach($post as $value)

            <div class="card col-6 col-md-4 col-lg-3">
                <div class="card-wrapper p-3">
                <a href="{{url('videos_detail/'.$value->slug.'/play')}}">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{ $value->image==''?'http://img.youtube.com/vi/'.$value->video_id.'/mqdefault.jpg':url($value->image)}}" alt="Videos" media-simple="true">
                    </div></a>
                    <div class="card-box">
                    <a href="{{url('videos_detail/'.$value->slug.'/play')}}">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media" style="text-decoration: underline; color: firebrick; margin-bottom: 5px;">
                            {!! $value->title !!}
                        </h4> </a>
                       <p class="font-media-desc">
                         {!! substr(strip_tags($value->description),0,$value->language_code=="kh"?'175':'65') !!} ...
                        </p>
                    </div>
                </div>
            </div>

             @endforeach
            </div>
          @endforeach

@if(count($posts) > 0)
        <div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="{{url('videofreemore')}}">All Videos</a>
          </div>
@else
<div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="#">No Videos</a>
          </div>
@endif
          <hr>
          
    </div>

@include('Site::ads.body')

  </div>


 <div class="col-lg-3">

@include('Site::side.search')
@include('Site::ads.side')
@include('Site::side.social')
@include('Site::side.video_free')
       
    </div>

 </div>

</div>
</section>


@endsection