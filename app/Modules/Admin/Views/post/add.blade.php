@extends('layouts.layout')

@section('content')

<div class="col-xs-12">
<div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix" style="padding-top: 5px;">
                          <a href="{{ url('admin/post') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
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
<li class=""><a href="#tabauthordefault" data-toggle="tab">{{ trans('common.description') }}</a></li>
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
        <label for="description">{{ trans('common.description_short') }} </label>
      </td>
       <td>
      {!! Form::textarea('description[]',null,array("class"=>"form-control","id"=>"description_".$v->code,"style"=>"height:100px;", "placeholder"=>$v->name )) !!}
      </td>
      </tr>  
    </table>
   </div>
@endforeach   

<div class="tab-pane fade" id="tabauthordefault">

 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">
 <tr>   
  <td>
     {!! Form::textarea('author_description',null,array('class'=>'form-control editor','id'=>'author_description',"style"=>"height:100px;")) !!}
   </td>
   </tr>
</table>
</div> 
 </div>

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
            <a data-input="thumbnail1" id="lfm1" data-preview="holder1" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail1" class="form-control" type="text" name="image">
 </div>
 <img id="holder1" src="{{url('public/uploads/images/none_image.jpg')}}" style="border:1px solid;margin-top:15px;max-height:100px;"> 
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
    $('#lfm1').filemanager('image', {prefix: route_prefix});
  </script>
<script type="text/javascript">

 $('#sub_category_hide').hide();

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
</script>

<script type="text/javascript" src="{{ asset('public/asset/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/asset/ckeditor/adapters/jquery.js') }}"></script>

<script type="text/javascript">
 
CKEDITOR.replace('author_description', {
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
      filebrowserFlashBrowseUrl: route_prefix + '?type=Images',
      filebrowserFlashUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}'
});
//$('textarea.editor').ckeditor();
</script>
@endsection
