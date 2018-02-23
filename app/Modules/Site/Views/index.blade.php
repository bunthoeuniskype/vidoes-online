@extends('Site::layouts/main')

@section('title')
Home Page
@endsection

@section('content')
<style type="text/css">
  .row{
    margin-left: -5px;
    margin-right: -5px;
  }
</style>
<div class="container-fluid"> 
<h5 class="subcategory"><span class="mbr-iconfont mbri-video-play"></span> <a href="{{url('')}}">{{ trans('common.last_video') }}</a></h5>  
<div id="home-app"></div>    
</div>
@include('Site::ads.body')


@endsection