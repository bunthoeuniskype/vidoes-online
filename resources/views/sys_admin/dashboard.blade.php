@extends('layouts.layout')

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/neon-core.css
') }}"/>

@endsection

@section('content')

 
 <div class="col-12 clearfix"> 



 <div class="col-md-3">
                <div class="tile-stats tile-blue">
                <a href="{{ url('admin/user') }}">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="num" data-start="0" data-end="8" data-postfix="#" data-duration="1500" data-delay="0" id="user_count"><i class="fa fa-user"></i> 0 </div>
                   <h3>{{ trans('common.user') }}</h3>
                   <p>User</p>
                   </a>
                </div>
 </div>

  <div class="col-md-3">
                <div class="tile-stats tile-green">
                <a href="{{ url('admin/customer') }}">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="num" data-start="0" data-end="8" data-postfix="#" data-duration="1500" data-delay="0" id="customer_count"><i class="fa fa-users"></i> 0 </div>
                    <h3>{{ trans('common.customer') }}</h3>
                   <p>Customer</p>
                   </a>
                </div>
 </div> 
  
   <div class="col-md-3">
                <div class="tile-stats tile-pink">
                <a href="{{ url('admin/feedback') }}">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div class="num" data-start="0" data-end="8" data-postfix="#" data-duration="1500" data-delay="0" id="feedback_count"><i class="fa fa-envelope"></i> 0 </div>
                    <h3>{{ trans('common.message') }}</h3>
                   <p>Messsage</p>
                   </a>
                </div>
 </div> 
  
 <div class="col-md-3">
                <div class="tile-stats tile-brown">
                <a href="{{ url('admin/setting') }}">
                    <div class="icon"><i class="fa fa-cog"></i></div>
                    <div class="num" data-start="0" data-end="8" data-postfix="#" data-duration="1500" data-delay="0" id="setting"><i class="fa fa-cog"></i></div>
                    <h3>{{ trans('common.setting') }}</h3>
                   <p>Setting</p>
                   </a>
                </div>
 </div> 

  <div class="col-md-3">
                <div class="tile-stats tile-white">
                <a href="{{ url('admin/backupdb') }}">
                    <div class="icon"><i class="fa fa-server"></i></div>
                    <div class="num" data-start="0" data-end="8" data-postfix="#" data-duration="1500" data-delay="0" id="backupdb"><i class="fa fa-server"></i></div>
                    <h3>Backup Database</h3>
                   <p>Backup Database</p>
                   </a>
                </div>
 </div> 
  
  

</div>   
<script type="text/javascript">

  $(function () {   
    $('#user_count').html('<?= $user_count ?>');
    $('#customer_count').html('<?= $customer_count ?>'); 
    $('#feedback_count').html('<?= $feedback_count ?>');    
  });


</script>    

@endsection