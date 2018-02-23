@extends('layouts.layout')

@section('content')

      <div class="col-xs-8 col-xs-offset-2">
<div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix">  
                       <a href="{{url('user')}}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.add') }} {{ trans('common.back') }}</button></a>                       
                        <h3> {{ trans('common.edit') }} {{ trans('common.user') }} </h3>
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


 {!! Form::model($user, array('route' => array('user.update', $user->id),'dojoType'=>'dijit/form/Form','method'=>'PUT')) !!}
{{ csrf_field() }}

<script type="dojo/method" event="onSubmit">   
 
  if(this.validate()) {  
    $('#btnsave').prop("disabled",true);
   return true;
  } else {
   return false;
  }
    
</script>
  <table  cellspacing="10" class="table">
      <tr>
        <td style="width: 25%;">
          <label for="Name">{{ trans('common.name') }} : </label>
        </td>
        <td>
  {!! Form::text('name',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","propercase"=>"true", "id"=>"name_user","required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>
      <tr>
        <td>
          <label for="email">{{ trans('common.email') }} : </label>
        </td>
        <td>
  {!! Form::text('email',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"email_user", "required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>

  <tr>
    <td>
          <label for="Password">{{ trans('common.password') }} : </label>
        </td>
        <td>
  {!! Form::password('password',array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>"password","trim"=>"true" )) !!}
</td> 
</tr>   
  <tr>
    <td>
          <label for="confirm_password">{{ trans('common.confirm_password') }} : </label>
        </td>
        <td>
  {!! Form::password('confirm_password',array("data-dojo-type"=>"dijit/form/ValidationTextBox", "id"=>'confirm_password', "trim"=>"true" )) !!}
</td> 
</tr>  
  <tr>
    <td>
          <label for="roles">{{ trans('common.role') }} : </label>
        </td>
        <td>
  {!! Form::select('roles[]', $roles,$userRole, array('class'=> 'form-control','multiple',"required"=>"true")) !!}
 
</td> 
</tr>

    <tr>
    <td>
          <label for="status">{{ trans('common.status') }}</label>
        </td>
        <td>
   <div class="input-group">
            <div id="radioBtn" class="btn-group">
              <a class="btn btn-success btn-sm {{ $user->status==1? 'active' : 'notActive' }}" data-toggle="status" data-title="1">Enable</a>
              <a class="btn btn-success btn-sm {{ $user->status==0? 'active' : 'notActive' }}" data-toggle="status" data-title="0">Disable</a>
            </div>
            <input type="hidden" name="status" value="{{ $user->status }}" id="status">
    </div>

  </td>
  </tr>

  <tr>
<td style="border-top:0px;"></td>
     <td class="pull-right" style="border-top:0px;">
        <button type="reset" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
        </td>
        </tr>             
    </table>
     {!! Form::close() !!} 
  
  
      </div>
    </div>
   </div>


@endsection
