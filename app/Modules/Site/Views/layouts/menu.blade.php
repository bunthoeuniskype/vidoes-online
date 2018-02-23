<section class="menu cid-qwcsDU8Yc0" once="menu" id="menu1-h" data-rv-view="30">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger text-black">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>
        </button>

    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">  
          @include('Site::inc.logo')
         <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true" id="menu"> 
            <li class="nav-item" style="border-left:0.5px solid #82bbb7;">
                      <a class="nav-link link display-4" href="{{url('')}}">
                      <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                               {{ trans('common.home') }}
                     </a>
            </li>
       <!-- CATEGORY -->
        @foreach($category as $c)

            @if(DB::table('sub_category')->where(['status'=>1,'category_group_id'=>$c->group_id,'language_code'=>App::getlocale()])->count('group_id') > 0) 
                  <li class="nav-item dropdown open">
                  <a class="nav-link link dropdown-toggle display-4" href="{{url('category/'.$c->slug)}}" data-toggle="dropdown-submenu" aria-expanded="true">

                  <span class="mbr-iconfont mbr-iconfont-btn"></span>
                  {{ $c->name }}
                    </a>
                    <div class="dropdown-menu">
                    @foreach(DB::table('sub_category')->where(['status'=>1,'category_group_id'=>$c->group_id,'language_code'=>App::getlocale()])->get() as $sc)                    
                    <a class="dropdown-item text-white display-4" href="{{url('subcategory/'.$sc->slug)}}">
                    {{ $sc->name }}
                   </a>
                     <hr style="padding: 0px;margin: 0px;">                    
                    @endforeach
                    </div>

                    </li>
        @else
                <li class="nav-item">
                    <a class="nav-link link display-4" href="{{url('category/'.$c->slug )}}">
                      {{ $c->name }}
                    </a>
                </li>
        @endif

        @endforeach  
           
            </ul>
            <ul class="lang-search">
             <li>
              <span>
                <a style="margin-right: 1px;"  href="{{url('locale?locale=kh')}}"><img style="max-height: 17px;" src="{{ asset('public/uploads/flags/kh.png') }}"> </a> <a style="margin-right:2px"  href="{{url('locale?locale=en')}}"><img style="max-height: 17px;" src="{{ asset('public/uploads/flags/gb.png') }}"> </a> 
           </span> 
            </li>
            <li>
              @include('Site::inc.search')   
            </li>
            </ul>
        </div>       
    </nav>
    
</section>

<script type="text/javascript">
  $(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.href;    
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);
    
    var arr = path.split('/');
   var newlink = path.replace('/'+arr[6], '');

   var arr2 = newlink.split('/');
   var newlink2 = newlink.replace('/'+arr2[6], '');
   
    $("#menu li a").each(function () {      
        var href = $(this).attr('href');        
        if (path === href) {
            $(this).closest('li').addClass('active');
        }else if(newlink == href){
          $(this).closest('li').addClass('active');
        }else if(newlink2 == href){
           $(this).closest('li').addClass('active');
        }
    });
}
</script>
