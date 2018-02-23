
<style type="text/css">

  .nav-tabs>li {
    float: right;
    margin-bottom: -1px;
 }
 .nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.428571429;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}

.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}


</style>
<div class="col-12">

 <h5 class="subcategory">{{trans('common.comment')}}</h5>


    <ul class="nav nav-tabs">
      <li class="active"><a href="#webtab" data-toggle="tab">Web</a></li>
      <li><a href="#facebooktab" data-toggle="tab">Facebook</a></li>
    </ul>

             
    <div  class="tab-content">
 <div class="tab-pane fade in active show" id="webtab">
<div class="col-12">

<input type="hidden" id="post_group_id" value="{{$post_group_id}}">
<textarea id="description" rows="3" style="width:100%" class="from-control" placeholder="Type Your Comment here,...."></textarea>
</div>      
<div class="col-12">   
<button id="btnComment" style="font-size: 18px;border-radius: 30px 31px; background-color: #c70613;color: #ffffff;cursor: pointer; padding: 7px 18px;"> Submit </button></div>

  
<div class="col-12">
  <table class="table table-responsive">
  @foreach($comment as $cmt)
<tr>
<td style="padding: 3px;"><b>{{ $cmt->customer_id==""?'User' : $cmt->customer->username }} </b>: <span class="text-primary"> {{ date_format($cmt->created_at, 'd-M-Y H:i:s') }} </span>

<img width="50x" class="img-circle" style="float:left; margin-right:10px;" src="{{asset('public/uploads/images/user.jpg')}}">
     <p style="margin-bottom: 1px;">{{$cmt->description}}</p>
   
</td>
    </tr>
@endforeach

@if(count($comment) > 0)
<tr>
<td style="padding: 3px; text-align:center;">
<p style="text-decoration: underline; cursor: pointer; color: blue; text-align: center;"  id="viewAllComment">View All Comments</p>
</td>
</tr>
@endif
  </table>
</div>

      </div>

  <div class="tab-pane fade" id="facebooktab">

@include('Site::inc.commentfacebook')

      </div>
  </div>




</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <h6 class="modal-title">Sign In</h6>

    <button type="button" class="close" data-dismiss="modal">&times;</button>      
      </div>
      <div class="modal-body">
       <form class="mbr-form" action="{{url('customer/login')}}" method="post" data-form-title="Mobirise Form">
            {{ csrf_field() }}
                <div data-for="name">
                    <div class="form-group">
                        <input type="text" class="form-control px-3" name="username" data-form-field="username" placeholder="Username" required="" id="name-header15-13">
                    </div>
                </div>
                <div data-for="password">
                    <div class="form-group">
                        <input type="password" class="form-control px-3" name="password" data-form-field="Email" placeholder="Password" required="" id="email-header15-13">
                    </div>
                </div>                
               <input type="hidden" name="oldUrl" value="{{url('')}}">
                <span class="input-group-btn">
                  <span class="input-group-btn"><button type="submit" class="btn btn-xs btn-primary display-4" style="cursor: pointer;"><span class="mbri-lock mbr-iconfont mbr-iconfont-btn"></span>Loign</button>  <a href="{{url('customer/register')}}" class="btn btn-xs btn-primary display-4" style="margin-left: 10px;border-radius: 100px !important; padding: 0.5rem 2rem;cursor: pointer;"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>Register</a></span>
                </span> 
            </form>
      </div>
     <div class="modal-footer">
     @if(Session::has('failed'))
       <em style="color: red;">{!! Session('failed') !!}</em>
     @endif
      </div> 
    </div>

  </div>
</div>

<script type="text/javascript">
  
 $(function() {
   
$('#btnComment').on('click',function () {

@if(!Session::has('customer')) 

$('#myModal').modal('toggle');
//$('#myModal').modal('show');
//$('#myModal').modal('hide');
@else
  var description = $('#description').val();
  var post_group_id = $('#post_group_id').val();

  $.get('{{url('comment_post')}}',{ 'description': description,'post_group_id' : post_group_id},function(data){
    $('#commentPost').load('{{url('comment_get')}}?post_group_id='+ post_group_id);
     });
@endif
});

$('#viewAllComment').on('click',function () {
     var post_group_id = $('#post_group_id').val();
     $('#commentPost').load('{{url('comment_get_all')}}?post_group_id='+ post_group_id);
   });

@if(Session::has('failed'))
$('#myModal').modal('toggle');
@endif

});

</script>
