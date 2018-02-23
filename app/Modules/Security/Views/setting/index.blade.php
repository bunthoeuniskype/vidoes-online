@extends('layouts.layout')

@section('content')

<script type="text/javascript">

require(['dijit/form/Form']);
require(['dijit/layout/TabContainer']);
require(['dijit/layout/ContentPane']);
require(['dijit/form/ValidationTextBox']);
require(['dijit/form/Button']);
require(['dojo/parser']);

</script>

<div class="col-xs-8 col-xs-offset-2">
 <div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix">                        
                        <h3> {{ trans('common.setting') }} </h3>
                         </div>
                            <div class="panel panel-body" style="min-height: 350px;  margin-top: -23px;">

<!-- show error input-->
@include('errors/errors')

 @if(Session::has('save'))
                        <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                      </div>
  @endif

 {!! Form::model($setting, array('route' => array('setting.update', $setting->id),'dojoType'=>'dijit/form/Form','method'=>'PUT')) !!}
{{ csrf_field() }}

<script type="dojo/method" event="onSubmit">   
 
  if(this.validate()) {  
      dijit.byId('btnsave').set('disabled',true); 
   return true;
  } else {
   return false;
  }    
</script>

<div id="mainTabContainer" style="max-width:830px; height: 370px;" dojoType="dijit/layout/TabContainer" region="center"  >
      <div class="tabContentSection" dojoType="dijit/layout/ContentPane"  title="Client" selected="true" style="overflow:hidden;">
        <div id='data_table1' name='data_table1' >
      <table  cellspacing="10" class="table">
      <tr>
        <td>
          <label for="develop_for_client">{{ trans('common.develop_for_client') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_for_client',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"develop_for_client", "required"=>"true", "trim"=>"true" )) !!}
</td> 
   <td>
   <label for="client_address">{{ trans('common.client_address') }} : </label>
        </td>
        <td>
  {!! Form::text('client_address',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox",  "id"=>"client_address", "required"=>"true","trim"=>"true" )) !!}
</td>   
</tr>

<tr>
 <td>
   <label for="client_phone">{{ trans('common.client_phone') }} : </label>
        </td>
        <td>
  {!! Form::text('client_phone',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"client_phone","required"=>"true","trim"=>"true" )) !!}
</td> 
   <td>
          <label for="client_email">{{ trans('common.client_email') }} : </label>
        </td>
        <td>
  {!! Form::text('client_email',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"client_email","required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>

<tr>
<td>
 <label for="client_website">{{ trans('common.client_website') }} : </label>
        </td>
        <td>
  {!! Form::text('client_website',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"client_website","required"=>"true","trim"=>"true" )) !!}
</td> 
<td>
 <label for="client_map">{{ trans('common.client_map') }} : </label>
        </td>
        <td>
  {!! Form::text('client_map',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"client_map","required"=>"true","trim"=>"true" )) !!}
</td> 
 </tr>

 <tr>
<td>
 <label for="link_youtube">{{ trans('common.link_youtube') }} : </label>
        </td>
        <td>
  {!! Form::text('link_youtube',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"link_youtube","required"=>"true","trim"=>"true" )) !!}
</td> 
<td>
 <label for="link_facebook">{{ trans('common.link_facebook') }} : </label>
        </td>
        <td>
  {!! Form::text('link_facebook',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"link_facebook","required"=>"true","trim"=>"true" )) !!}
</td> 
 </tr>

 <tr>
<td>
 <label for="link_instagram">{{ trans('common.link_instagram') }} : </label>
        </td>
        <td>
  {!! Form::text('link_instagram',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"link_instagram","required"=>"true","trim"=>"true" )) !!}
</td> 
<td>
 <label for="facebook_id">{{ trans('common.facebook_id') }} : </label>
        </td>
        <td>
  {!! Form::text('facebook_id',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"facebook_id","required"=>"true","trim"=>"true" )) !!}
</td> 
 </tr>

  <tr>
<td>
 <label for="youtube_id">{{ trans('common.youtube_id') }} : </label>
        </td>
        <td>
  {!! Form::text('youtube_id',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"youtube_id","required"=>"true","trim"=>"true" )) !!}
</td> 
<td>
 <label for="image">{{ trans('common.logo') }} : </label>
        </td>
        <td>
 <div class="input-group">
          <span class="input-group-btn">
            <a data-input="thumbnail" id="lfm" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          {{Form::text('logo',null,array('id'=>'thumbnail','class'=>'form-control','placeholder'=>'logo minimum size 300 x 120 '))}}
 </div>
 </td> 

<td>
  
</td> 
 </tr>

 </table> 
 </div>
      </div>  
<div class="tabContentSection" dojoType="dijit/layout/ContentPane" title="Developer" selected="false">
       <div id='data_table' name='data_table'>

 <table  cellspacing="10" class="table">
      <tr>
        <td>
          <label for="develop_by">{{ trans('common.develop_by') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_by',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox",  "id"=>"develop_by","required"=>"true","trim"=>"true" )) !!}
</td> 
   <td>
   <label for="develop_address">{{ trans('common.develop_address') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_address',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"develop_address","required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>

<tr>
<td>
   <label for="develop_phone">{{ trans('common.develop_phone') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_phone',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox",  "id"=>"develop_phone","required"=>"true","trim"=>"true" )) !!}
</td> 
   <td>
   <label for="develop_email">{{ trans('common.develop_email') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_email',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"develop_email","required"=>"true","trim"=>"true" )) !!}
</td> 

</tr>
  <tr>       
   <td>
   <label for="develop_website">{{ trans('common.develop_website') }} : </label>
        </td>
        <td>
  {!! Form::text('develop_website',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"develop_website","required"=>"true","trim"=>"true" )) !!}
</td> 
   <td>
   <label for="copy_right">{{ trans('common.copy_right') }} : </label>
        </td>
        <td>
  {!! Form::text('copy_right',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"copy_right","required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>
</table>
  </div>
 </div>



     </div>
<table cellspacing="10" class="table">
<tr>
 <td style="padding-right: 5px; border-top:0px;">
   
          <button class="pull-right" type="submit" data-dojo-type="dijit/form/Button" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>

          <button type="reset" class="pull-right" data-dojo-type="dijit/form/Button"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
</td> 
</tr>
</table>
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
