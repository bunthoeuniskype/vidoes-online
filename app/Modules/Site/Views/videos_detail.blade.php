@extends('Site::layouts/main')

@section('meta')
@include('Site::inc.meta')
@endsection

@section('title')
{{$post->title}}
@endsection

@section('script')
<script type="text/javascript"> var baseUrl = "{{ url('') }}"; </script>
@endsection

@section('content')

<div class="row" style="margin-left: 0px; margin-right: 0px;">
   <div class="col-12 col-md-8">
      <div id='vdo_play'>
          <iframe width="100%" max-width="560" max-height="315" height="315"  src="https://www.youtube.com/embed/{{ $videoplay->video_id }}" frameborder="0" allowfullscreen></iframe>    
      </div>
      <div class="video-title">
        {{ $post->title }}
      </div>
      @include('Site::inc.rating')
   </div>
   <div class="col-12 col-md-4"> 
            <div id='vdo_play_list'>
                <?php 
                $videolist = DB::table('video_list')->where(['language_code'=>App::getLocale(),'status'=>1,'post_group_id'=>$post->group_id])->orderBy('order','ASC')->get(); 
                  ?>
              <ul type="1" style="margin-bottom: 0px; background-color:rgb(238, 238, 238); list-style: none;overflow:hidden;">
                 <a href="{{ url('videos_detail/'.$post->slug.'/play') }}"> <li><img height="120px;" src="https://img.youtube.com/vi/{{$post->video_id}}/mqdefault.jpg"> <br/> {{$post->title}}</li></a>
                    @foreach($videolist as $vl)
                      <a href="{{ url('videos_detail/'.$vl->slug.'/plays') }}"> <li><img height="120px;" src="https://img.youtube.com/vi/{{$vl->video_id}}/mqdefault.jpg"> <br/> {{$vl->title}}</li></a>
                    @endforeach
               </ul>
            </div>
  </div>
  <div class="col-12">
   <h5 class="subcategory">{{ trans('common.description') }}</h5> 
       <div class="row" style="margin-left: 0px;margin-right: 0px;">
         <div class="col-12">  
            {!! $post->author_description !!}     
        </div>
    </div>
      <div id="commentPost" style="width: 100%;">
      <div class="col-12">
       <h5 class="subcategory">{{trans('common.comment')}}</h5>
         @include('Site::inc.commentfacebook')
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-left: 0px; margin-right: 0px;">
    <div class="container-fluid">
 
        <h5 class="subcategory">{{trans('common.video_related')}}</h5>

<!--  <div  class="media-container-row"> -->
<div class="row">
<?php $subcpost = DB::table('post')->where(['sub_category_group_id'=> $post->sub_category_group_id, ['sub_category_group_id', '<>', '0'],'language_code'=>App::getlocale(),'status'=>1])->limit(6)->orderBy('group_id','DESC')->get() ?>    

      @if(count($subcpost) > 0)

       @foreach($subcpost as $value)

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

         @else

           @foreach(DB::table('post')->where(['category_group_id'=> $post->category_group_id,'language_code'=>App::getlocale(),'status'=>1])->limit(6)->orderBy('group_id','DESC')->get() as $value)

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
                      </div>
                  </div>
              </div>
             @endforeach
           @endif
      </div>
    </div>
 </div>

@endsection

