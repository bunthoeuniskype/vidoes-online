
@extends('layouts.layout')


@section('script')

<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>

@endsection

@section('stylesheet')

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>

@endsection


@section('content')

<div id="panel panel-default" style="margin-top: -20px;">
                        <div class="panel panel-heading clearfix" style="margin-bottom: -20px; padding-bottom:0px;">
                        <h3 style="margin-top: -5px; margin-bottom: -7px;"> {{ trans('common.security') }}</h3>
                         </div>

<div class="panel panel-body">
 @if(Session::has('save'))
                        <div class="alert alert-success" style="margin-top: 15px;">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
  @endif
  </div>
   <div class="panel panel-body col-xs-6">
   <div class="h4 text-center">{{ trans('common.login_history') }}</div>
    <table class="table table-striped table-bordered nowrap table-over" id="Login-table">
        <thead>
               <tr>
                  <th>#</th>                  
                  <th>{{ trans('User Name') }} </th>
                  <th>{{ trans('IP Address') }} </th>
                  <th>{{ trans('Login DateTime') }} </th>
                  <th>{{ trans('Action') }} </th>
                </tr>
        </thead>
           <tbody>
           <?php $i = 1; ?>
           @foreach($data as $value)
               <tr>
                  <td>{{ $i++ }}</td>                  
                  <td>{{ $value->user_id==0?'':$value->user->name }} </td>
                  <td>{{ $value->ip_address }} </td>
                  <td>{{ $value->date }} </td>
                  <td>{!! '<a href="'.url('security/'.$value->id.'/addblock').'" class="btn btn-xs btn-danger"><i class="fa fa-plus"></i> Block</a>' !!}</td>
                </tr>
                @endforeach
        </tbody>
    	</table>
    </div>


       <div class="panel panel-body col-xs-6">
       <div class="h4 text-center">{{ trans('common.list_block_ip_address') }}</div>
    <table class="table table-striped table-bordered nowrap table-over" id="block-table">
        <thead>
               <tr>
                  <th>#</th>
                  <th>{{ trans('IP Address') }} </th>
                  <th>{{ trans('Block DateTime') }} </th>
                   <th>{{ trans('Status') }} </th>
                   <th>{{ trans('Action') }} </th>
                </tr>
        </thead>
           <tbody>
           <?php $i = 1; ?>
           @foreach($block as $value)
               <tr>
                  <td>{{ $i++ }}</td>                  
                  <td>{{ $value->ip_address }} </td>                  
                  <td>{{ $value->created_at }} </td>
                  <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
                  <td> {!! $value->status==1? '<a href="'.url('security/'.$value->id.'/unblock').'" class="btn btn-xs btn-primary"><i class="fa fa-unlock-alt "></i> UnBlock</a>':'<a href="'.url('security/'.$value->id.'/block').'" class="btn btn-xs btn-danger"><i class="fa fa-lock"></i> Block</a>' !!} </td>
                </tr>
             @endforeach
        </tbody>
    	</table>
    </div>

	</div>

      <script>
$(function() {
    $('#Login-table').DataTable({
          language: {
        searchPlaceholder: "{{ trans('common.search') }}"
    	}
      });

     $('#block-table').DataTable({
          language: {
        searchPlaceholder: "{{ trans('common.search') }}"
    	}
      });

     $.fn.dataTable.ext.errMode = 'throw';
});


</script>

    @stop

@push('scripts')
  
@endpush






                        