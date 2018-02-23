@extends('layouts.layout')

@section('script')

<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>

@endsection
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>
@endsection

@section('content')

<div class="col-12">  
   <div class="col-xs-6">

<div class="panel panel-defualt" style="margin-top:-20px;">
     <div class="panel panel-heading clearfix" style="padding-top: 5px;">
      <h3 style="margin-top: 5px;"> {{ trans('common.linkdownload') }} </h3>
            </div>
     <div class="panel panel-body">

 <table class="table table-striped table-bordered nowrap table-over" id="videolist-table">
        <thead>
               <tr>
            <th width="5%">#</th>  
            <th>{{ trans('common.title') }}</th>  
            <th width="10%">{{ trans('common.link') }}</th>
            <th width="10%">{{ trans('common.action') }}</th>
             <th width="5%">{{ trans('common.status') }}</th>        
            </tr>
        </thead>
        <body>
        <?php $i=1; ?>
        @foreach($linkdownload as $value)
          <tr>
            <td>{{ $i++ }}</td>                   
              <td>{{ $value->title }}</td>
               <td><a href="{{ $value->link }}" target="_blank"> {{ substr($value->link,0,30) }}</a></td>
               <td><a href="{{ url('admin/linkdownload/'.$value->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> {{ trans('common.edit') }}</a>
               <a href="{{ url('admin/linkdownload/'.$value->id.'/delete') }}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> {{ trans('common.delete') }}</a>
               </td>
                <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
          </tr>
          @endforeach
        </body>
    </table>

<script>
$(function() {
    $('#videolist-table').DataTable({ });
     $.fn.dataTable.ext.errMode = 'throw';
});
</script>

        </div>        
      </div>  

   </div>

      <div class="col-xs-6">
<div class="panel panel-defualt" style="margin-top:-20px;">
                        <div class="panel panel-heading clearfix" style="padding-top: 5px;">
                          <a href="{{ url('admin/post') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.add') }} {{ trans('common.linkdownload') }} </h3>
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


 {!! Form::open(array('url'=>'admin/linkdownload','id'=>'linkdownload','dojoType'=>'dijit/form/Form')) !!}
 
 {{ csrf_field() }}

<script type="dojo/method" event="onSubmit">    
  if(this.validate()) {    
    $('#btnsave').prop("disabled",true);
     return true;
  } else {   
    return false;
  }  
    
</script>

 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table">

 <tr>
    <td>
          <label for="post">{{ trans('common.post') }} </label>
        </td>
        <td>
  {!! Form::select('post_group_id',$post,null,array("data-dojo-type"=>"dijit/form/FilteringSelect","id"=>"post", "required"=>"true" )) !!}
  </td>
  </tr>
  <tr>
    <td>
          <label for="title">{{ trans('common.title') }}</label>
        </td>
        <td>
  {!! Form::text('title',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"title", "required"=>"true" )) !!}
  </td>
  </tr>

<tr>
    <td>
          <label for="link">{{ trans('common.link') }}</label>
        </td>
        <td>
  {!! Form::text('link',null,array("data-dojo-type"=>"dijit/form/ValidationTextBox","id"=>"link", "required"=>"true" )) !!}
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
 
 {!! Form::close() !!} 
      </div>
    </div>
</div>

   </div>


@endsection
