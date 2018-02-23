@if(count($ads_body) > 0)
<div class="container-fluid">

  <!-- <h5 class="subcategory">Advertisement</h5>  -->

       <div  class="media-container-row">  
            <div class="col-lg-12">
     <img class="img img-responsive" src="{{asset($ads_body->image)}}" style="width: 100%">
            </div>
   
      </div>
    </div>

@endif