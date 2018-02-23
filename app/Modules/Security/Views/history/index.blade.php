
@extends('layouts.layout')


@section('script')

<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>

@endsection

@section('stylesheet')

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>

@endsection


@section('content')

<div id="panel panel-default" style="margin-top: -20px;">
    
   <div class="panel panel-body col-xs-6 col-xs-offset-3">
   <div class="h4 text-center">{{ trans('common.login_history') }}</div>
    <table class="table table-striped table-bordered nowrap table-over" id="Login-table">
        <thead>
               <tr>
                  <th>#</th>                  
                  <th>{{ trans('User Name') }} </th>
                  <th>{{ trans('Email') }} </th>               
                  <th>{{ trans('Login DateTime') }} </th>
                
                </tr>
        </thead>
           <tbody>
           <?php $i = 1; ?>
           @foreach($data as $value)
               <tr>
                  <td>{{ $i++ }}</td>                  
                  <td>{{ $value->user_id==0?'':$value->user->name }} </td>
                  <td>{{ $value->user_id==0?'':$value->user->email }} </td>                
                  <td>{{ $value->date }} </td>                 
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

     $.fn.dataTable.ext.errMode = 'throw';
});


</script>

@endsection







                        