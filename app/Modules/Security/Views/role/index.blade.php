
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

                           <a href="{{ url('role/create') }}"><button class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> {{ trans('common.add') }} {{ trans('common.new') }}</button></a>

                 

                           <a href="{{ url('user') }}"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }}</button></a>
                      </div>
                       

<div class="panel panel-body">

 @if(Session::has('save'))
                        <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif

 <style type="text/css">  
  #role-table_length{
    margin-top: -5px;
  }
   </style>

    <table class="table table-striped table-bordered nowrap table-over" id="role-table">
        <thead>
               <tr>
                  <th>#</th>
                  <th>{{ trans('common.name') }}</th>
                  <th>{{ trans('common.description') }} </th>
                  <th>{{ trans('common.action') }} </th> 
                  <th width="3%">{{ trans('common.status') }} </th>  
              </tr>
        </thead>
        <tbody>

<?php $id =1; ?>

       @foreach($roles as $value)
          <tr>
           <td>{{ $id++ }}</td>
            <td>{{ $value->display_name }}</td>
            <td>{{ $value->description }}</td>
            <td>
    <a href="{{ url('role/'.$value->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a></td>            
            <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
</div>
      <script>
$(function() {
    $('#role-table').DataTable({});
    $.fn.dataTable.ext.errMode = 'throw';
});
</script>

@endsection








                        