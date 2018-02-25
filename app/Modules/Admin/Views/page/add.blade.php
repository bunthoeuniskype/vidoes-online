@extends('layouts.layout')

@section('content')

<div class="col-xs-12">
<div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix" style="padding-top: 5px;">
                          <a href="{{ url('admin/page') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.add') }} {{ trans('common.page') }} </h3>
                         </div>
                            <div class="panel panel-body">

<!--show error -->
@include('errors/errors')

 @if(Session::has('save'))
                        <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif


 {!! Form::open(array('url'=>'admin/page','id'=>'page','dojoType'=>'dijit/form/Form')) !!}
 
 {{ csrf_field() }}

<script type="dojo/method" event="onSubmit">    
  if(this.validate()) { 
    $('#btnsave').prop("disabled",true);
     return true; 
  } else {   
    return false;
  }      
</script>

<div class="col-xs-12">
 <ul class="nav nav-tabs">
 @foreach($language as $key => $v) 
     <li class="{{ $key==0?'active':''}}"><a href="#tab{{$key}}default" data-toggle="tab">{{$v->name}}</a></li>   
@endforeach
</ul>
  <div class="tab-content">
   
  @foreach($language as $key => $v)
  
   <div class="tab-pane fade {{ $key==0?'in active':''}}" id="tab{{$key}}default">  

  <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
      <tr>      
       <td>
      {!! Form::text('title[]',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"title_".$v->code, "required"=>"true","placeholder"=>$v->name )) !!}
      </td>
      </tr>  
     
       <tr>
      <td>
      {!! Form::textarea('description['.$key.']',null,array("class"=>"form-control","id"=>"description_".$v->code,"style"=>"height:100px;", "placeholder"=>$v->name )) !!}
      </td>
      </tr>       
    </table>
   </div>
@endforeach   
  <table class="table">
    <tr>      
      <td>
       {!! Form::text('order',0,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"order".$v->code, "required"=>"true","placeholder"=>$v->name )) !!}
      </td>
      </tr>  
    <tr>    
     <td class="pull-right" style="border-top:0px;">
    <button type="reset" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
      </td>
      </tr>
  </table>
 </div>

</div>


 {!! Form::close() !!} 


      </div>
    </div>
   </div>

<!-- laravel-filemanager -->
 <script>
   var route_prefix = "{{ url(config('lfm.prefix')) }}";
  </script>
  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  
<script type="text/javascript" src="{{ asset('public/asset/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/asset/ckeditor/adapters/jquery.js') }}"></script>

<script type="text/javascript">
@foreach($language as $key => $v) 
CKEDITOR.replace('description[{{$key}}]', {
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
      filebrowserFlashBrowseUrl: route_prefix + '?type=Images',
      filebrowserFlashUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}'
});
@endforeach
//$('textarea').ckeditor();
</script>
@endsection
