@extends('Site::layouts/main')

@section('title')
{{$category->name}}
@endsection

@section('content')

<div class="container-fluid"> 
  
<h5 class="subcategory"><span class="mbr-iconfont mbri-video-play"></span> <a href="{{url('category/'.$category->slug)}}">{{$category->name}}</a></h5>  

<div id="get-by-url-app" style="padding-left:12px;padding-right:12px;"></div>

</div>

@include('Site::ads.body')

<script type="text/javascript">
var fullurl = document.URL;
var url1 = fullurl.substr(0, fullurl.lastIndexOf('/'));
var url2 = url1.substr(0, url1.lastIndexOf('/'));

</script>
@endsection