@extends('layouts/master_layout_site')

@section('title')
Home Page
@endsection

@section('content')

<section class="cid-qwcsE0gn1m" data-interval="false" data-rv-view="62" style="text-align: center;">
 
</section>
<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="margin-bottom: -75px;">

    <div class="container">

 <div class="row">
  
  <div class="col-lg-9">

<div class="container-fluid"> 
  
        <h5 class="subcategory">Videos Newest</h5>  

    @foreach($posts_newest->chunk(4) as $post)
       
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
    </div>


    @include('Site::ads.body')


    <div class="container-fluid">       

        @foreach($subcategory as $key => $v)

 @if(DB::table('post')->where(['sub_category_group_id'=> $v->group_id,'language_code'=>App::getlocale(),'status'=>1])->count('sub_category_group_id') > 0)
        <h5 class="subcategory">{{$v->name}}</h5>
  @endif

    <div  class="media-container-row">

    @foreach(DB::table('post')->where(['sub_category_group_id'=> $v->group_id,'language_code'=>App::getlocale(),'status'=>1,'download_type'=>'sale'])->limit(4)->orderBy('group_id','DESC')->get() as $value)
       
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
        @if(DB::table('post')->where(['sub_category_group_id'=> $v->group_id,'language_code'=>App::getlocale(),'status'=>1])->count('sub_category_group_id') > 4)
        <div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="{{ url('subcategory/'.$v->slug )}}">More Videos</a>
          </div>
          <hr>
          @endif
        @endforeach  
        
    </div>
  </div>


 <div class="col-lg-3">

 <form novalidate="novalidate" onsubmit="return false;" class="searchbox sbx-custom">
  <div role="search" class="sbx-custom__wrapper">
    <input type="search" name="search" placeholder="Search Videos" autocomplete="off" required="required" class="sbx-custom__input">
    <button type="submit" title="Submit" class="sbx-custom__submit">
      <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
    </button>
    <button type="reset" title="Clear the search query." class="sbx-custom__reset">
      <span class="mbri-close mbr-iconfont mbr-iconfont-btn"></span>
    </button>
  </div>
</form>
<script type="text/javascript">
  document.querySelector('.searchbox [type="reset"]').addEventListener('click', function() {  this.parentNode.querySelector('input').focus();});
</script>


@include('Site::ads.side')
@include('Site::side.social')
@include('Site::side.video_free')
 </div>


 </div>

</div>
</section>


@endsection