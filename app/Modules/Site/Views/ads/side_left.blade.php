@if(count($side_left) > 0 )
 <!--  <h5 class="subcategory">Advertisement</h5>  -->
        <div class="row" style="margin-left: 0px;"> 
     @foreach($side_left as $vsl)         
     <div class="col-lg-12 col-3"  id="advertise-left">
                    <div class="card-img">   
                    {!! $vsl->ads_type=='Video'?'<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$vsl->video_id.'" frameborder="0" allowfullscreen></iframe>' : '<img class="img img-responsive" src="'.asset($vsl->image).'">' !!}
                    </div>
        </div>
      @endforeach
 </div>

@endif