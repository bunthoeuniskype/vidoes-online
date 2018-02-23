@if(count($side_right) > 0 )
 <!--  <h5 class="subcategory">Advertisement</h5>  -->
     <div class="row" style="margin-right: 0px;">        
     @foreach($side_right as $vsr)         
     <div class="col-lg-12 col-3" id="advertise-right">
                    <div class="card-img">   
                    {!! $vsr->ads_type=='Video'?'<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$vsr->video_id.'" frameborder="0" allowfullscreen></iframe>' : '<img class="img img-responsive" src="'.asset($vsr->image).'">' !!}
                    </div>
        </div>
      @endforeach
 </div>
@endif