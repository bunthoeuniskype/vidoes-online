
<div style="display: flex;">
<h5>Share This : </h5>
<span style="margin-left: 10px;"><a href="http://www.facebook.com/sharer.php?u={{ $urlShare }}&title={{$post->title}}" target="_blank"><img style="border-radius: 50%; height: 25px;" src="{{asset('public/uploads/images/social/fb.jpg')}}"></span>
<span style="margin-left: 10px;"><a href="https://plus.google.com/share?url={{ $urlShare }}&title={{$post->title}}" target="_blank"><img style="border-radius: 50%; height: 25px;" src="{{asset('public/uploads/images/social/go.jpg')}}"></a></span>
<span style="margin-left: 10px;"><a href="https://twitter.com/share?text={{$post->title}}&url={{ $urlShare }}&amp;hashtags=Cam-School" target="_blank"><img  style="border-radius: 50%; height: 25px;" src="{{asset('public/uploads/images/social/tw.jpg')}}"></a></span>
</div>
