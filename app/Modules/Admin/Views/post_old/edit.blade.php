@extends('layouts.layout')

@section('content')

<div class="col-xs-12">
 <div class="panel panel-defualt">
                        <div class="panel panel-heading clearfix" style="padding-top: 0px; margin-top: -9px;">
                          <a href="{{ url('admin/post') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.edit') }} {{ trans('common.post') }} </h3>
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

   
 {!! Form::open(array('url'=>'admin/post/'.$id,'id'=>'post','dojoType'=>'dijit/form/Form','method'=>'put')) !!}
 
 {{ csrf_field() }}

<script type="dojo/method" event="onSubmit">    
  if(this.validate()) { 
    $('#btnsave').prop("disabled",true);
     return true; 
  } else {   
    return false;
  }  
    
</script>

<div class="col-xs-8"> 
   
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
     {!! Form::textarea('content[]',$v->content,array('class'=>'form-control',3>4,'id'=>'myArea')) !!}
   </td>
    </table>

   </div>



@if($key==1)
 </div>
</div>

 <div class="col-xs-4"> 
 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
 
 <tr>
    <td width="30%">
    <label for="category">{{ trans('common.category') }} </label>
        </td>
     <td>
  {!! Form::select('category_group_id',$category,$v->category_group_id,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"category", "required"=>"true" )) !!}
  </td>
  </tr>

   <tr>
    <td>
    <label for="sub_category">{{ trans('common.sub_category') }} </label>
        </td>
     <td>
  {!! Form::select('sub_category_group_id',$subcategory,$v->sub_category_group_id,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"sub_category", "required"=>"true" )) !!}
  </td>
  </tr>

  <tr>
    <td>
    <label for="link">{{ trans('common.video_id') }} </label>
        </td>
     <td>
  {!! Form::text('video_id',$v->video_id,array("data-dojo-type"=>"dijit/form/TextBox","id"=>"video_id" )) !!}
  </td>
  </tr>
  
    <tr>
    <td>
    <label for="link">{{ trans('common.image') }} </label>
        </td>
     <td>
 <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="image" value="{{$v->image}}">
 </div>
  <img id="holder" src="{{$v->image==''?url('public/uploads/images/none_image.jpg'):url($v->image)}}" style="border:1px solid;margin-top:15px;max-height:100px;">
  </td>
  </tr>
    <tr>
    <td>
          <label for="status">{{ trans('common.status') }}</label>
        </td>
        <td>
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
     <td style="border-top:0px;"> </td>
    <td class="pull-right" style="border-top:0px;">
    <button type="reset" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
        </td>
      </tr>
    </table>
    </div>
    @endif
  
@endforeach   

 {!! Form::close() !!} 

      </div>
    </div>
   </div>

 <!-- TinyMCE init -->
 
<script src="{{ asset('public/assets/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  require(['dojo/parser']);
    var editor_config = {
      path_absolute : "",
      selector: "textarea[id=myArea",
      plugins: [
        "link image"
      ],
      relative_urls: false,
      height: 200,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>

<!-- laravel-filemanager -->
 <script>
   var route_prefix = "{{ url(config('lfm.prefix')) }}";
  </script>
  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>

@endsection
