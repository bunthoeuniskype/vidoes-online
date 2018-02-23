@extends('layouts/master_layout_site')

@section('content')


<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="padding-top: 100px; padding-bottom: 10px;">
    
     <div class="container">
        <div class="row">

            <div class="col-md-6">





               <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $post->video_id }}" frameborder="0" allowfullscreen></iframe>       
 <ul>
          @foreach(DB::table('video_list')->where(['language_code'=>App::getLocale(),'status'=>1,'post_group_id'=>$post->group_id])->orderBy('order','ASC')->get() as $vl)
            <li> {{$vl->title }} </li>
          @endforeach
  </ul>
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
                 <a class="btn btn-sm btn-primary display-3" href="#">
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