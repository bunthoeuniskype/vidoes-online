<style type="text/css">

.rating ul{margin:0;padding:0;}
.rating li{cursor:pointer;list-style-type: none; display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
 .rating .highlight, .rating .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}

</style>
<div class="row clearfix" style="margin-right: 0px; margin-left: 0px;">

<div class="col-12">

 <h5 class="rating" style="display: flex;" id="rating_post_{{ $post_group_id }}"> 
 Rating : 
 <input type="hidden" name="rating" id="rating" value="{{$post->rating}}" />
<ul onMouseOut="resetRating({{ $post_group_id }});" style="padding-left:5px;">
  <?php
  for($i=1;$i<=5;$i++) {
  $selected = "";
  if(!empty($post->rating) && $i<=$post->rating) {
  $selected = "selected";
  }
  ?>
  <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,{{ $post_group_id }});" onmouseout="removeHighlight({{ $post_group_id }});" onClick="addRating(this,{{ $post_group_id }});">&#9733;</li>  
  <?php }  ?>
</ul>

<div style="padding-top: 6px;padding-left: 10px; font-size: 14px; float: right;"> Views : {{ $post->count_view+1 }}</div>
</h5> 

@include('Site::inc.share')

  </div>
</div>


<script type="text/javascript">

function highlightStar(obj,id) {
  removeHighlight(id);    
  $('#rating_post_'+id+' li').each(function(index) {
    $(this).addClass('highlight');
    if(index == $('#rating_post_'+id+' li').index(obj)) {
      return false; 
    }
  });
}

function removeHighlight(id) {
  $('#rating_post_'+id+' li').removeClass('selected');
  $('#rating_post_'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
  $('#rating_post_'+id+' li').each(function(index) {
    $(this).addClass('selected');
    $('#rating_post_'+id+' #rating').val((index+1));
    if(index == $('#rating_post_'+id+' li').index(obj)) {
      return false; 
    }
  });
 
 $.ajax({
  url: "{{route('rating_post')}}",
  data:'group_id='+id+'&rating='+$('#rating_post_'+id+' #rating').val()+'&_token={{ csrf_token() }}',
  type: "POST"
  }); 
}

function resetRating(id) {
  if($('#rating_post_'+id+' #rating').val() != 0) {
    $('#rating_post_'+id+' li').each(function(index) {
      $(this).addClass('selected');
      if((index+1) == $('#rating_post_'+id+' #rating').val()) {
        return false; 
      }
    });
  }
} 


 //$('#commentPost').load('{{url('comment_get_all')}}?post_group_id='+ post_group_id);



</script>

