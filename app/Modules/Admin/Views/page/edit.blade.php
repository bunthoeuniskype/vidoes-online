@extends('layouts.layout')

@section('content')

<div class="col-xs-12">
 <div class="panel panel-defualt">
                        <div class="panel panel-heading clearfix" style="padding-top: 0px; margin-top: -9px;">
                          <a href="{{ url('admin/page') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.edit') }} {{ trans('common.page') }} </h3>
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

   
 {!! Form::open(array('url'=>'admin/page/'.$id,'id'=>'post','dojoType'=>'dijit/form/Form','method'=>'put')) !!}
 
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
@foreach($post as $key => $v) 
     <li class="{{ $key==0?'active':''}}"><a href="#tab{{$key}}default" data-toggle="tab">{{$v->language->name}}</a></li>   
@endforeach
</ul>
<div class="tab-content">
   
@foreach($post as $key => $v)
   <div class="tab-pane fade {{ $key==0?'in active':''}}" id="tab{{$key}}default"> 

  <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
  <tr>  
   <td>
  {!! Form::text('title[]',$v->title,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"title_".$v->language_code, "required"=>"true","placeholder"=>$v->name )) !!}
  </td>
  </tr>  
  
   <tr>  
   <td>
  {!! Form::textarea('description['.$key.']',$v->content,array("class"=>"form-control","id"=>"description_".$v->code,"style"=>"height:100px;", "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

  </table>
   </div>

 @if($key == 1) 
 <table class="table">
 <tr>      
      <td>
       {!! Form::text('order',$v->order,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"order".$v->code, "required"=>"true","placeholder"=>$v->name )) !!}
      </td>
 </tr>  

 <tr>
 <td class="pull-right">
   <div class="input-group">
            <div id="radioBtn" class="btn-group">
              <a class="btn btn-success btn-sm {{ $v->status==1? 'active' : 'notActive' }}" data-toggle="status" data-title="1">Enable</a>
              <a class="btn btn-success btn-sm {{ $v->status==0? 'active' : 'notActive' }}" data-toggle="status" data-title="0">Disable</a>
            </div>
            <input type="hidden" name="status" value="{{ $v->status }}" id="status">
    </div>
  </td>
  </tr>
   <tr>    
    <td class="pull-right" style="border-top:0px;">
    <button type="reset" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
        </td>
   </tr>
 </table>
 @endif 
  
@endforeach   

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
//$('textarea.editor').ckeditor();
</script>
@endsection
