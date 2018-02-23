@extends('layouts.layout')

@section('script')

<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/js/excelexportjs.js') }}"></script>

@endsection
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>
@endsection

@section('content')


<div id="panel panel-default" style="margin-top: -20px;">
                  
                  <div class="panel panel-heading clearfix" style="margin-bottom: -15px;">
 
                        <a href="#" download="" id="btnExport"> <button class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i> {{ trans('common.export_excel') }} </button></a>

                        <h3 style="margin-top: 5px;">{{ trans('common.list') }} {{ trans('common.customer') }} </h3>
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


    <table class="table table-striped table-bordered nowrap table-over" id="customer-table">
        <thead>
               <tr>
             <th width="5%">#</th>            
            <th>{{ trans('common.username') }}</th> 
            <th>{{ trans('common.password') }}</th>
            <th>{{ trans('common.email') }}</th>
             <th>{{ trans('common.phone') }}</th>
             <th width="5%">{{ trans('common.status') }}</th>        
            </tr>
        </thead>
        <body>
        <?php $i=1; ?>
        @foreach($customer as $value)
          <tr>
            <td>{{ $i++ }}</td>           
              <td>{{ $value->username }}</td>
              <td>********</td>
              <td>{{$value->email}}</td>
              <td>{{$value->phone}}</td>
              <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
          </tr>
          @endforeach
        </body>
    </table>
    </div>
</div>

      <script>
$(function() {
    $('#customer-table').DataTable({     
   "aLengthMenu": [[10,25, 50, 100, -1], [10,25, 50, 100, "All"]]
    });
     $.fn.dataTable.ext.errMode = 'throw';

   
    $(document).ready(function () {
        $("#btnExport").on('click', function () {
            var uri = $("#customer-table").excelexportjs({
                containerid: "customer-table"
                , datatype: 'table'
                , returnUri: true
            });
            $(this).attr('download', 'customer_ecamschool.xls').attr('href', uri).attr('target', '_blank');
        });
    });

});
</script>

    @stop

@push('scripts')
  
@endpush
