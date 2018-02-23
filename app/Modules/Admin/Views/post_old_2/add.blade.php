@extends('layouts.layout')

@section('content')

<div class="col-xs-12">
<div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix" style="padding-top: 5px;">
                          <a href="{{ url('admin/subcategory') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.add') }} {{ trans('common.post') }} </h3>
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


 {!! Form::open(array('url'=>'admin/post','id'=>'post','dojoType'=>'dijit/form/Form')) !!}
 
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
 @foreach($language as $key => $v) 
     <li class="{{ $key==0?'active':''}}"><a href="#tab{{$key}}default" data-toggle="tab">{{$v->name}}</a></li>   
@endforeach
<li class=""><a href="#tabauthordefault" data-toggle="tab">Author</a></li>
</ul>
  <div class="tab-content">
   
  @foreach($language as $key => $v)
   <div class="tab-pane fade {{ $key==0?'in active':''}}" id="tab{{$key}}default">  

  <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
  <tr>
   <td>
    <label for="title">{{ trans('common.title') }} </label>
  </td>
   <td>
  {!! Form::text('title[]',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"title_".$v->code, "required"=>"true","placeholder"=>$v->name )) !!}
  </td>
  </tr>  

  <tr>
   <td>
    <label for="file_type_1">{{ trans('common.file_type_1') }} </label>
  </td>
   <td>
  {!! Form::text('file_type_1[]','Excel',array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"file_type_1_".$v->code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

  <tr>
   <td>
    <label for="quantity_file_type_1">{{ trans('common.quantity_file_type_1') }} </label>
  </td>
   <td>
  {!! Form::text('quantity_file_type_1[]','0',array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"quantity_file_type_1_".$v->code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="file_type_2">{{ trans('common.file_type_2') }} </label>
  </td>
   <td>
  {!! Form::text('file_type_2[]','Video',array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"file_type_2_".$v->code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="quantity_file_type_2">{{ trans('common.quantity_file_type_2') }} </label>
  </td>
   <td>
  {!! Form::text('quantity_file_type_2[]','0',array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"quantity_file_type_2_".$v->code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="description">{{ trans('common.description') }} </label>
  </td>
   <td>
  {!! Form::textarea('description[]',null,array("class"=>"form-control","id"=>"description_".$v->code,"style"=>"height:100px;", "placeholder"=>$v->name )) !!}
  </td>
  </tr>  


    </table>
   </div>
@endforeach   

<div class="tab-pane fade" id="tabauthordefault">
Autor
</div> 
 </div>

<script type="text/javascript">
  var baseUrl = "{{ url('') }}";
</script>
<script src="{{ asset('public/assets/nicEditor/nicEdit.js') }}" type="text/javascript"></script>
<script type="text/javascript">
 bkLib.onDomLoaded(function() { 
    nicEditors.editors.push(
        new nicEditor().panelInstance(
            document.getElementById('author')
        )
    );
  });
</script>
 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
 <tr>
   <td>
    <label for="title">{{ trans('common.author') }} </label>
  </td>
  <td>
     {!! Form::textarea('author',null,array('class'=>'form-control','id'=>'author')) !!}
   </td>
    </table>
</div>
 <div class="col-xs-4"> 

 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">

 <tr>
    <td width="30%">
    <label for="category">{{ trans('common.category') }} </label>
        </td>
     <td>
  {!! Form::select('category_group_id',$category,null,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"category", "required"=>"true","onchange"=>"select_sub_category();" )) !!}
  </td>
  </tr>

   <tr id="sub_category_hide">
    <td>
    <label for="sub_category">{{ trans('common.sub_category') }} </label>
        </td>
     <td>
  {!! Form::select('sub_category_group_id',['0'=>'None'],null,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"sub_category", "required"=>"true" )) !!}
  </td>
  </tr>


   <tr>
    <td>
    <label for="download_type">{{ trans('common.download_type') }} </label>
        </td>
     <td>
  {!! Form::select('download_type',['sale'=>'Sale','free'=>'Free'],null,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"download_type", "required"=>"true" )) !!}
  </td>
  </tr>

  <tr>
    <td>
    <label for="price">{{ trans('common.price') }} </label>
        </td>
     <td>
  {!! Form::text('price',0,array("data-dojo-type"=>"dijit/form/TextBox","id"=>"price" )) !!}
  </td>
  </tr>


  <tr>
    <td>
    <label for="link">{{ trans('common.video_id') }} </label>
        </td>
     <td>
  {!! Form::text('video_id',null,array("data-dojo-type"=>"dijit/form/TextBox","id"=>"video_id" )) !!}
  </td>
  </tr>
  
    <tr>
    <td>
    <label for="link">{{ trans('common.image') }} </label>
        </td>
     <td>
 <div class="input-group">
          <span class="input-group-btn">
            <a data-input="thumbnail" id="lfm" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="image">
 </div>
 <img id="holder" src="{{url('public/uploads/images/none_image.jpg')}}" style="border:1px solid;margin-top:15px;max-height:100px;">
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
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
  </script>


@endsection
