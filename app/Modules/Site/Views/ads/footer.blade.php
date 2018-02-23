<style type="text/css">
#footer-ads	img{
		width: 100%;
	}
</style>
<div class="row" style="margin-left: 0px; margin-right: 0px;">
@if(count($ads_foot) > 0)
	@foreach($ads_foot as $vf)
		<div class="col-md-4" id="footer-ads">
		 @if($vf->ads_type == 'Banner')
		  <img class="img img-responsive" src="{{asset($vf->image)}}" style="max-width: 100%; max-height: 118px;width: 100%;">
		 @elseif($vf->ads_type == 'Video')
		 	<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$vf->video_id.'" frameborder="0" allowfullscreen></iframe>
		 @else
		 	 {!! $vf->ads_script !!} 
		 @endif
		</div>
	@endforeach
@endif
</div>
</div>
