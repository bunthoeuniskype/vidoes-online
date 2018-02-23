  @if(count($ads_side) > 0 )
   <h5 class="subcategory">Advertisement</h5> 
        <div class="row"> 
     @foreach($ads_side as $vs)         
     <div class="col-lg-12 col-6" style="padding:0px 15px;">
                    <div class="card-img">   
                    {!! $vs->ads_type=='Video'?'<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$vs->video_id.'" frameborder="0" allowfullscreen></iframe>' : '<img class="img img-responsive" src="'.asset($vs->image).'">' !!}
                    </div>
        </div>
      @endforeach
 </div>
<hr>
@endif