@extends('Site::layouts/main')

@section('title')
{{$subcategory->name}}
@endsection

@section('content')

<div class="container-fluid"> 
<h5 class="subcategory"><span class="mbr-iconfont mbri-video-play"></span> <a href="{{url('subcategory/'.$subcategory->slug)}}">{{$subcategory->name}}</a></h5>  

<div id="get-by-url-app"></div>

</div>

@include('Site::ads.body')

@endsection