@extends('layouts/master_layout_site')

@section('meta')
@include('Site::meta')
@endsection

@section('title')
{{$post->title}}
@endsection

@section('script')
<script type="text/javascript"> var baseUrl = "{{ url('') }}"; </script>
@endsection

@section('content')

<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="padding-top: 100px; padding-bottom: 10px;">
    
     <div class="container">
        <div class="row">

@include('Site::rating')
@include('Site::share')
</div>

  <div class="row">
   <div class="col-md-6">

<div class="col-xs-12">

<div id='vdo_play'>

<iframe width="100%" max-width="560" max-height="315" height="315"  src="https://www.youtube.com/embed/{{ $videoplay->video_id }}" frameborder="0" allowfullscreen></iframe>       
</div>
<div id='vdo_play_list'>
<?php 
$videolist = DB::table('video_list')->where(['language_code'=>App::getLocale(),'status'=>1,'post_group_id'=>$post->group_id])->orderBy('order','ASC')->get(); 

?>
<ol type="1" style="margin-bottom: 0px; background-color:rgba(221, 1, 1, 0.78);">

<a href="{{ url('videos_detail/'.$post->slug.'/play') }}"> <li><img height="35px;" src="https://img.youtube.com/vi/{{$post->video_id}}/mqdefault.jpg">  {{$post->title}}</li></a>

 @foreach($videolist as $vl)
<a href="{{ url('videos_detail/'.$vl->slug.'/plays') }}"> <li><img height="35px;" src="https://img.youtube.com/vi/{{$vl->video_id}}/mqdefault.jpg">  {{$vl->title}}</li></a>
 @endforeach
 </ol>
</div>

</div>
    </div>
            <div class="col-md-6">              
                <div>
                    <div class="icon-block pb-3">
                      <h4 style="text-decoration: underline;">{{ $post->title }}</h4>
                    </div>
                    <div class="icon-contacts pb-3" style="margin-top: 20px;">

                    <h6>{!! $post->description !!}</h6>

                     <h5>{!! $post->file_type_1 !!} : {!! $post->quantity_file_type_1 !!}</h5>

                     <h5>{!! $post->file_type_2 !!} : {!! $post->quantity_file_type_2 !!}</h5>
                    </div>

                     <div class="cycle-price" >
                     {{ $post->price=='0'?'Free':'$ '.$post->price }}
                    </div>

                    <div class="navbar-buttons mbr-section-btn">
                 <a class="btn btn-sm btn-primary display-3" href="{{url('download/'.$post->slug.'/resource')}}">
                    <span class="mbri-save mbr-iconfont mbr-iconfont-btn "></span>
                  Download Now
                </a>
                </div>


                </div>
                
            </div>
<div class="col-12">
 <h5 class="subcategory">Author</h5> 
{!! $post->author !!}

</div>


<div id="commentPost" style="width: 100%;">

@include('Site::comment')
</div>
  </div>
</div>
 
 
</section>

<hr>
<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="margin-bottom: -75px;">
<div class="container">
<div class="row">
    <div class="container-fluid">
 
        <h5 class="subcategory">Videos Related</h5>

 <div  class="media-container-row">

    @foreach(DB::table('post')->where(['sub_category_group_id'=> $post->sub_category_group_id,'language_code'=>App::getlocale(),'status'=>1])->limit(4)->orderBy('group_id','DESC')->get() as $value)
       
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
                         {!! str_replace('�','',substr(strip_tags($value->description),0,$value->language_code=="kh"?'225':'85')) !!} ...
                        </p>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
       
      
        
    </div>
    </div>
    </div>
</section>
@endsection