@extends('layouts.layout')
@section('script')
<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
@endsection
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>
@endsection

@section('content')

  <div class="col-xs-12">
    <div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix"> 
                         <a href="{{url('role')}}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }}</button></a>                        
                        <h3> {{ trans('common.add') }} {{ trans('common.role') }} </h3>
                         </div>

<div class="panel panel-body col-xs-12">
@include('errors/errors')
@if(Session::has('save'))
                        <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif

 {!! Form::open(array('url'=>'role','id'=>'role_register','dojoType'=>'dijit/form/Form')) !!}


{{ csrf_field() }}
<script type="dojo/method" event="onSubmit">   
 
  if(this.validate()) {  
      dijit.byId('btnsave_role').set('disabled',true); 
   return true;
  } else {
   return false;
  }
    
</script>

 <div class="col-xs-6"> 
  <div class="col-xs-12"> 
 <strong>{{ trans('common.permission') }} :</strong>
</div>
    
                @foreach($permission->chunk(3) as $perm)
                <div class="col-xs-4">                  
                  @foreach($perm as $value)
                   <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->display_name }}</label>
                  <br/>
                  @endforeach
                </div>
                @endforeach
 </div>

 <div class="col-xs-6">
   

  <table  cellspacing="10" class="table">
      <tr>
        <td style="width: 30%;">
          <label for="Name">{{ trans('common.name') }} : </label>
        </td>
        <td>
  {!! Form::text('name',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","propercase"=>"true", "id"=>"name_role","required"=>"true","trim"=>"true" )) !!}
</td> 
</tr>
<tr>
  <td style="width: 30%;">
          <label for="display_name">{{ trans('common.display_name') }} : </label>
        </td>
        <td>
  {!! Form::text('display_name',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","propercase"=>"true", "id"=>"display_name","required"=>"true","trim"=>"true" )) !!}
</td> 

</tr>

  <tr>
    <td>
    <label for="description">{{ trans('common.description') }} : </label>
        </td>
        <td>
        {{ Form::textarea('description',null,array('class'=>'form-control')) }}

</td> 
</tr>   
  <tr>
<td  style="border-top: 0px;"></td>
     <td class="pull-right"  style="border-top: 0px;">
       <button type="reset" data-dojo-type="dijit/form/Button"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" data-dojo-type="dijit/form/Button" id="btnsave_role"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
        </td>
        </tr>             
    </table>
     {!! Form::close() !!}  

 </div>
 
      </div>


    </div>
   </div>


@endsection
