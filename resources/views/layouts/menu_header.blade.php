
<style type="text/css">
  .active_menu{
    background-color: blue;
  }
</style>
<script type="text/javascript">
  $(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.href;    
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    
    var arr = path.split('/');
   var newlink = path.replace('/'+arr[6], '');

   var arr2 = newlink.split('/');
   var newlink2 = newlink.replace('/'+arr2[6], '');
   
    $("#menu li a").each(function () {      
        var href = $(this).attr('href');        
        if (path === href) {
            $(this).closest('li').addClass('active_menu');
        }else if(newlink == href){
          $(this).closest('li').addClass('active_menu');
        }else if(newlink2 == href){
           $(this).closest('li').addClass('active_menu');
        }
    });
}
</script>


<ul id="menu">
<li>
          <a href="{{ url('admin/dashboard') }}" title="Home" style="border-left: 1px solid #999;">
                 <i class="fa fa-home" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.dashboard')}} </b>
           </a>
</li>

<li>
<a href="{{url('admin/category')}}" title="">
                 <i class="fa fa-list" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.category')}} </b>
           </a>
</li>

<li>
<a href="{{url('admin/subcategory')}}" title="">
                 <i class="fa fa-list" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.sub_category')}} </b>
           </a>
</li>

<li>
<a href="{{url('admin/post')}}" title="">
                 <i class="fa fa-newspaper-o" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.post')}} </b>
           </a>
</li>


<li>
<a href="{{url('admin/page')}}" title="">
                 <i class="fa fa-newspaper-o" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.page')}} </b>
           </a>
</li>

<li>
<a href="{{url('admin/advertisement')}}" title="">
                 <i class="fa fa-file-image-o" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.advertisement')}} </b>
           </a>
</li>

<li>
<a href="{{url('admin/customer')}}" title="">
                 <i class="fa fa-users" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.customer')}} </b>
           </a>
</li>
<li>
<a href="{{url('admin/feedback')}}" title="">
                 <i class="fa fa-users" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.message')}} </b>
           </a>
</li>


<li>
          <a href="{{url('admin/user')}}" title="">
                 <i class="fa fa-user" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.user')}} </b>
           </a>
</li>

<li>
          <a href="{{url('admin/history')}}" title="">
                 <i class="fa fa-history" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.history_login')}} </b>
           </a>
</li>

<li>
          <a href="{{url('admin/setting')}}" title="">
                 <i class="fa fa-cog" aria-hidden="true" style="padding-bottom: 3px;"></i>
              <br>
            <b>{{ trans('common.setting')}} </b>
           </a>
</li>



</ul>

 <style type="text/css">
   #control_language{
    width: 100%;
    height: 30px;
    font-size: 12px;
    margin-top: 3px;
   }
 </style><div style="float: right;">
 
         {{ Form::Open(array('url'=>'locale','method'=>'post')) }}
                                {{csrf_field()}}
                                {{ Form::select('locale',['en'=>trans('common.english'),'kh'=>trans('common.khmer')],App::getLocale(),array("class"=>"form-control",'id'=>'control_language','onchange'=>'this.form.submit()'))}}
                              {{ Form::Close() }}
  
  
<h5 style="color: #fff; margin-top: 7px; margin-bottom: 6px; padding-right: 3px;"> {{ trans('common.user') }} : {{ Auth::user()->name }}  <span><a href="{{ url('/sys_logout') }}" style="color:#fd1e1e;"><i class="fa fa-sign-out" aria-hidden="true"></i>{{ trans('common.exit') }}</a></span></h5> 
</div>