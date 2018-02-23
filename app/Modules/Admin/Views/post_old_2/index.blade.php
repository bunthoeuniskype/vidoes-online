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
                         <a href="{{ url('admin/post/create') }}"><button class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  {{ trans('common.add') }} {{ trans('common.new') }}</button></a>
                        <h3 style="margin-top: 5px;">{{ trans('common.list') }} {{ trans('common.post') }} </h3>
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
             <th width="5%">#</th>
            <th width="25%">{{ trans('common.title') }}</th> 
            <th width="65%">{{ trans('common.description') }}</th>   
            <th width="5%">{{ trans('common.action') }}</th>           
            <th width="5%">{{ trans('common.status') }}</th>        
            </tr>
        </thead>
        <body>
        <?php $i=1; ?>
        @foreach($post as $value)
          <tr>
            <td>{{ $i++ }}</td>             
            <td><a href="{{url('admin/post/'.$value->group_id.'/edit')}}"><?= substr($value->title, 0, 90)  ?> ...</a></td>         
            <td><a href="{{url('admin/post/'.$value->group_id.'/edit')}}"><?= substr(strip_tags($value->description), 0,$value->language_code=='kh'?'90':'90') ?> ...</a></td>
             <td><span><a  class="bnt btn-xs btn-primary" href="{{url('admin/addvideolist/'.$value->group_id) }}"> <i class="fa fa-plus"></i> Add Video </a> 
             <a  style="margin-left: 5px;" class="bnt btn-xs btn-success" href="{{url('admin/addlinkdownload/'.$value->group_id) }}"> <i class="fa fa-plus"></i> Add Downlod</a>
             </span></td>                           
            <td>{!! $value->status==1?'<i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>':'<i class="fa fa-remove text-warning"></i>' !!}</td>
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
