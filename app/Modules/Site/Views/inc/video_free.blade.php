@if(count($video_free) > 0)

<h5 class="subcategory">Free Download</h5> 
     <div class="row">
 @foreach($video_free as $vf)
      <div class="card col-lg-12 col-6" style="padding:0px 15px;">
                  <div class="card-wrapper p-3">
                <a href="{{url('videos_detail/'.$vf->slug.'/play')}}">
                    <div class="card-img">
                    <span class="mbr-iconfont mbri-video icon-play-style"></span>
                        <img src="{{ $vf->image==''?'http://img.youtube.com/vi/TOuEVx7jypM/mqdefault.jpg':asset($vf->image) }}" alt="Videos" media-simple="true">
                    </div></a>
                    <div class="card-box">
                    <a href="{{url('videos_detail/'.$vf->slug.'/play')}}">
                        <h4 class="card-title pb-3 mbr-fonts-style font-media" style="text-decoration: underline; color: firebrick; margin-bottom: 5px;">
                        {!! $vf->title !!}
                        </h4> </a>
                       <p class="font-media-desc">
                    {!! substr(strip_tags($vf->description),0,$vf->language_code=="kh"?'225':'85') !!} ...
                        </p>
                    </div>
                </div>
          </div>              
@endforeach

 </div>
@if(count($video_free) >= 3)
 <div class="mbr-section-btn text-center">
          <a class="btn btn-sm btn-secondary-outline display-3" href="{{ url('videofree') }}">More Videos</a>
          </div>
@endif

@endif