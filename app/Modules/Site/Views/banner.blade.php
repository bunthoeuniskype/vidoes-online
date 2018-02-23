@section('style')
<link rel="stylesheet" href="{{ asset('public/asset/bxslider/jquery.bxslider.min.css') }}" type="text/css">
@endsection

@section('script')

<script type="text/javascript" src="{{ asset('public/asset/bxslider/jquery.bxslider.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',           
            infiniteLoop: true, 
            auto:true,
            pager:false,
            speed: 1500,
        });
    });
</script>
@endsection


<section class="cid-qwcsE0gn1m" data-interval="false" data-rv-view="62" style="text-align: center;">
 <ul class="bxslider">
  <li><img class="img img-responsive" src="{{asset('public/uploads/images/video_tutoriales_1.jpg')}}" /></li>
  <li><img class="img img-responsive" src="{{asset('public/uploads/images/video_tutoriales_2.jpg')}}" /></li>
  <li><img class="img img-responsive" src="{{asset('public/uploads/images/video_tutoriales_3.jpg')}}" /></li>
</ul>
</section>