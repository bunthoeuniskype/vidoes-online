@extends('Site::layouts/main')

@section('title')
Search
@endsection

@section('content')

<div class="container-fluid"> 
  
<h5 class="subcategory"><span class="mbr-iconfont mbri-video-play"></span> <a href="#">{{ trans('common.search')}}</a></h5>  

@if(count($posts) > 0)

    @foreach($posts->chunk(3) as $post)
       
       <div  class="media-container-row">

       @foreach($post as $value)

            <div class="card col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="card-wrapper p-3">
                <a href="{{url('videos_detail/'.$value->slug.'/play')}}">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{ $value->image==''?'http://img.youtube.com/vi/'.$value->video_id.'/mqdefault.jpg':url($value->image)}}" alt="Videos" media-simple="true">
                    </div></a>
                    <div class="card-box">
                    <a href="{{url('videos_detail/'.$value->slug.'/play')}}">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media" id="link_title">
                            {!! $value->title !!}
                        </h4> </a>
                       <p class="font-media-desc">
                        {{ StringHelper::truncate($value->description, 100) }}
                        </p>
                    </div>
                </div>

            </div>

      @endforeach


              </div>
           @endforeach  
         <!-- <div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="#">View All</a>
          </div> -->
@else

          <div class="mbr-section-btn text-center">
              <a class="btn btn-sm btn-secondary-outline display-3" href="#">Not Found</a>
          </div>   

@endif

    </div>

@include('Site::ads.body')


@endsection