<meta property="og:title" content="{{substr($post->title,0,150) }}" />
<meta property="og:url" content="{{ $urlShare }}" />
<meta property="og:description" content="{{ substr($post->description,0,150) }}" />
<meta property="og:site_name" content="E-Cam-School" />
<meta property="og:type" content="article" />
<meta property="og:image" content="{{ $post->image==''?'http://img.youtube.com/vi/'.$post->video_id.'/mqdefault.jpg':url($post->image)}}" />
<meta property="og:see_also" content="{{url('')}}"/>

<meta property="twitter:creator" content="@E-Cam-School" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:title" content="{{substr($post->title,0,150) }}" />
<meta property="twitter:description" content="{{ substr($post->description,0,250) }}" />
<meta property="twitter:image" content="{{ $post->image==''?'http://img.youtube.com/vi/'.$post->video_id.'/mqdefault.jpg':url($post->image)}}" />
<meta name="twitter:domain" content="{{url('')}}"/>

<meta itemprop="name" content="{{substr($post->title,0,150) }}"/>
<meta itemprop="description" content="{{ substr($post->description,0,150) }}"/>
<meta itemprop="image" content="{{ $post->image==''?'http://img.youtube.com/vi/'.$post->video_id.'/mqdefault.jpg':url($post->image)}}"/>