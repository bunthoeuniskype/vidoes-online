<!--  <div  class="media-container-row"> -->
<div class="row">
	<div class="col-md-12">
 	<h5 class="subcategory">{{trans('common.video_related')}}</h5>
</div>
	   @foreach($postRelate as $value)
           <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
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

