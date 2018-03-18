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

@endsection

