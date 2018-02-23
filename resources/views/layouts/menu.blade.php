
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
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">             


@foreach($category as $c)
<!-- CATEGORY -->
 @if(DB::table('sub_category')->where(['status'=>1,'category_group_id'=>$c->group_id,'language_code'=>App::getlocale()])->count('group_id') > 0) 
<li class="nav-item dropdown open">
<a class="nav-link link dropdown-toggle text-white display-4" href="{{url('category/'.$c->slug)}}" data-toggle="dropdown-submenu" aria-expanded="true">

<span class="{{ $c->icon }} mbr-iconfont mbr-iconfont-btn"></span>
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
                    <a class="nav-link link text-white display-4" href="{{url('category/'.$c->slug )}}">
                        <span class="{{ $c->icon }} mbr-iconfont mbr-iconfont-btn"></span>
                      {{ $c->name }}
                    </a>
                </li>
@endif

@endforeach

   
                                
              
            </ul>

        </div>

       
    </nav>
    
</section>