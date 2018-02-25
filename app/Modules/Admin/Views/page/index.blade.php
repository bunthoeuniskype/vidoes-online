@extends('layouts.layout')

@section('script')

<script src="{{ asset('public/assets/js/jquery.dataTables.min.js') }}"></script>

@endsection
@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/jquery.dataTables.css') }}"/>
@endsection

@section('content')

<div id="panel panel-default" style="margin-top: -20px;">
                  
                  <div class="panel panel-heading clearfix" style="margin-bottom: -15px;">
                         <a href="{{ url('admin/page/create') }}"><button class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  {{ trans('common.add') }} {{ trans('common.new') }}</button></a>
                        <h3 style="margin-top: 5px;">{{ trans('common.list') }} {{ trans('common.page') }} </h3>
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


    <table class="table table-striped table-bordered nowrap table-over" id="category-table">
        <thead>
               <tr>
             <th width="3%">#</th>
            <th width="26%">{{ trans('common.title') }}</th> 
            <th width="65%">{{ trans('common.description') }}</th>          
            <th width="3%">{{ trans('common.status') }}</th>  
            <th width="3%">{{ trans('common.action') }}</th>      
            </tr>
        </thead>
        <body>
        <?php $i=1; ?>
        @foreach($post as $value)
          <tr>
            <td>{{ $i++ }}</td>             
            <td><a href="{{url('admin/page/'.$value->group_id.'/edit')}}"><?= substr($value->title, 0, 90)  ?> ...</a></td>         
            <td><a href="{{url('admin/page/'.$value->group_id.'/edit')}}"><?= substr(strip_tags($value->content), 0,$value->language_code=='kh'?'90':'90') ?> ...</a></td>
            <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
            <td><span><a  class="bnt btn-xs btn-danger" href="{{url('admin/page/'.$value->group_id.'/delete') }}"> <i class="fa fa-remove"></i> {{ trans('common.delete')}}</a> </td>  
          </tr>
          @endforeach
        </body>
    </table>
    </div>
</div>

      <script>
$(function() {
    $('#category-table').DataTable({ });
     $.fn.dataTable.ext.errMode = 'throw';
});
</script>

    @stop

@push('scripts')
  
@endpush
