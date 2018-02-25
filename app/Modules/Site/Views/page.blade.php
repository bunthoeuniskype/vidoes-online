@extends('Site::layouts/main')

@section('title')
{!! $page->title !!} 
@endsection
@section('content')

       <div class="row" style="margin-left:0px;margin-right: 0px;">

            <div class="col-md-12">
               <h4> {!! $page->title !!} </h4>
               <hr>
            </div>
             <div class="col-md-12">
                {!! $page->content !!} 
            </div>
    </div>


@endsection