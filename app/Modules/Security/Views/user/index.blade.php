
@extends('layouts.layout')


@section('script')


<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>

@endsection
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>
@endsection

@section('content')

<div id="panel panel-default" style="margin-top: -20px;">
                        <div class="panel panel-heading clearfix" style="margin-bottom: -20px;">
                        <a href="{{ url('admin/user/create') }}" style="margin-left: 5px;">
                         <button class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('common.add') }} {{ trans('common.new') }}</button></a>

                        <h3 style="padding-bottom: 3px; margin-top: -20px;"> {{ trans('common.list') }} {{ trans('common.user') }}</h3>
                         </div>

<div class="panel panel-body" style="margin-bottom:-20px; margin-top:-15px; padding-left: 31px;">                       
 @if(Session::has('save'))
                        <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif

   @if(Session::has('failed'))
                        <div class="alert alert-warning">
                        <em>{!! Session('failed') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif

</div>
<div class="panel panel-body">
 <style type="text/css">  
  #user-table_length{
    margin-top: -5px;
  }
   </style>

    <table class="table table-striped table-bordered nowrap table-over" id="user-table">
        <thead>
               <tr>
                  <th>#</th>
                  <th>{{ trans('common.name') }} </th>
                  <th>{{ trans('common.email') }} </th>                  
                  <th>{{ trans('common.action') }} </th> 
                  <th width="3%">{{ trans('common.status') }} </th>  
              </tr>
        </thead>
        <tbody>

<?php $id =1; ?>

       @foreach($user as $value)
          <tr>
           <td>{{ $id++ }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
       <!--  <td>
              @if(!empty($value->roles))
              @foreach($value->roles as $v)
                <label class="label label-success">{{ $v->display_name }}</label>
              @endforeach
               @endif
            </td>  -->
            <td><a href="{{ url('admin/user/'.$value->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> {{ trans('common.edit') }} </a></td>            
            <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
</div>
      <script>
$(function() {
    $('#user-table').DataTable({});
    $.fn.dataTable.ext.errMode = 'throw';
});
</script>

@endsection








                        