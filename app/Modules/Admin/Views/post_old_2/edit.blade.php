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
  <td><label for="title">{{ trans('common.title') }} </label></td>
   <td>
  {!! Form::text('title[]',$v->title,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"title_".$v->language_code, "required"=>"true","placeholder"=>$v->name )) !!}
  </td>
  </tr>  

  <tr>
   <td>
    <label for="file_type_1">{{ trans('common.file_type_1') }} </label>
  </td>
   <td>
  {!! Form::text('file_type_1[]',$v->file_type_1,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"file_type_1_".$v->language_code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

  <tr>
   <td>
    <label for="quantity_file_type_1">{{ trans('common.quantity_file_type_1') }} </label>
  </td>
   <td>
  {!! Form::text('quantity_file_type_1[]',$v->quantity_file_type_1,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"quantity_file_type_1_".$v->language_code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="file_type_2">{{ trans('common.file_type_2') }} </label>
  </td>
   <td>
  {!! Form::text('file_type_2[]',$v->file_type_2,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"file_type_2_".$v->language_code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="quantity_file_type_2">{{ trans('common.quantity_file_type_2') }} </label>
  </td>
   <td>
  {!! Form::text('quantity_file_type_2[]',$v->quantity_file_type_2,array("class"=>"form-control","id"=>"quantity_file_type_2_".$v->language_code, "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

   <tr>
   <td>
    <label for="description">{{ trans('common.description') }} </label>
  </td>
   <td>
  {!! Form::textarea('description[]',$v->description,array("class"=>"form-control","id"=>"description_".$v->code,"style"=>"height:100px;", "placeholder"=>$v->name )) !!}
  </td>
  </tr>  

 </table>

   </div>

@if($key==1)
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
     {!! Form::textarea('author',$v->author,array('class'=>'form-control','id'=>'author')) !!}
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
  {!! Form::select('category_group_id',$category,$v->category_group_id,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"category", "required"=>"true","onchange"=>"select_sub_category();" )) !!}
  </td>
  </tr>

<tr id="sub_category_hide">
   <script type="text/javascript">
  var sub_category_group_id = <?= $v->sub_category_group_id; ?>;
 </script>
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
  {!! Form::select('download_type',['sale'=>'Sale','free'=>'Free'],$v->download_type,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"download_type", "required"=>"true" )) !!}
  </td>
  </tr>

  <tr>
    <td>
    <label for="price">{{ trans('common.price') }} </label>
        </td>
     <td>
  {!! Form::text('price',$v->price,array("data-dojo-type"=>"dijit/form/TextBox","id"=>"price" )) !!}
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

<script type="text/javascript">
  dojo.require("dojo.data.ItemFileWriteStore");
  //check sub_category_store
var sub_category_store  = getDataStorefromJSON('id','name', []);

function select_sub_category() {

  var category_group_id = dijit.byId('category').get('value');
  var data_id = {'id': category_group_id};    
    $.ajax({
        type : 'GET',
        url : '{!! URL::route('select_sub_category') !!}',
        dataType:'json',
        data:data_id,
       success:function(data){   

       if(data.length>0){
       $('#sub_category_hide').show();
       sub_category_store  = getDataStorefromJSON('id','name', data);  
       dijit.byId('sub_category').set('store', sub_category_store);
       }else{
       sub_category_store  = getDataStorefromJSON('id','name', [{'id':0,'name':'None'}]);  
       dijit.byId('sub_category').set('store', sub_category_store);
       $('#sub_category_hide').hide();
       }      

  }// reponse success
});

}


var category_group_id = $('#category').val();
  var data_id = {'id': category_group_id};    
    $.ajax({
        type : 'GET',
        url : '{!! URL::route('select_sub_category') !!}',
        dataType:'json',
        data:data_id,
       success:function(data){   

       if(data.length>0){
       $('#sub_category_hide').show();
       sub_category_store  = getDataStorefromJSON('id','name', data);  
       dijit.byId('sub_category').set('store', sub_category_store);
       dijit.byId('sub_category').attr('value',sub_category_group_id);
       }else{
       sub_category_store  = getDataStorefromJSON('id','name', [{'id':0,'name':'None'}]);  
       dijit.byId('sub_category').set('store', sub_category_store);
       $('#sub_category_hide').hide();
       }      

  }// reponse success

}); 

</script>

@endsection
