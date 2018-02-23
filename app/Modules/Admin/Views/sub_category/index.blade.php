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
                         <a href="{{ url('admin/subcategory/create') }}"><button class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  {{ trans('common.add') }} {{ trans('common.new') }}</button></a>
                        <h3 style="margin-top: 5px;">{{ trans('common.list') }} {{ trans('common.sub_category') }} </h3>
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
             <th>{{ trans('common.category') }}</th>           
            <th>{{ trans('common.sub_category') }}</th> 
            <th width="10%">{{ trans('common.order') }}</th>
             <th width="10%">{{ trans('common.action') }}</th>
             <th width="5%">{{ trans('common.status') }}</th>        
            </tr>
        </thead>
        <body>
        <?php $i=1; ?>
        @foreach($subcategory as $value)
          <tr>
            <td>{{ $i++ }}</td>  
            <td>
            @foreach(DB::table('category')->where(['group_id'=>$value->category_group_id,'language_code'=>App::getLocale()])->get() as $c)
            {{ $c->name }}
            @endforeach
            </td>         
              <td>{{ $value->name }}</td>
               <td>{{ $value->order }}</td>
               <td><a href="{{ url('admin/subcategory/'.$value->group_id.'/edit') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> {{ trans('common.edit') }}</a>
                  <a href="{{ url('admin/subcategory/'.$value->group_id.'/delete') }}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> {{ trans('common.delete') }}</a>
               </td>
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
