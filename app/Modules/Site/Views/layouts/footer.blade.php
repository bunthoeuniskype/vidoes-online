<section class="cid-qwcsE0gn1m" id="footer1-j" data-rv-view="35" style="padding-top: 30px;">

    <div class="container">
        <div class="media-container-row content text-white"> 
          <?php 
              $aboutpage = StringHelper::pageQuery('about us');             
            ?>
            
           <div class="col-12 col-md-4 mbr-fonts-style display-7">
           @if($aboutpage)
               <div class="title-page">
                 <a href="{{url('page/'.$aboutpage->slug)}}"><h3> {{$aboutpage->title}} </h3></a>
               </div>
               <p class="mbr-text"> 
               {!!StringHelper::truncatePage($aboutpage->content,200,url('page/'.$aboutpage->slug))!!}
               </p>
             @endif                 
                <p class="mbr-text"> 
                <ul style="list-style: none; margin-bottom: 0rem;">  
                
                @if($footer->client_register == 1)
                <li>
                <a href="{{url('customer/login')}}">
                 <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                   {{ trans('common.login') }}
                </a>
                </li>
                <li>
                 <a href="{{url('customer/register')}}">
                 <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span> {{ trans('common.register') }}</a>
                 </li>
                 @endif
                 
                </ul>            
              </p>
            </div>


             <div class="col-12 col-md-4 mbr-fonts-style display-7">
                 <div class="title-page">
                  <a href="#"><h3> {{trans('common.follow_us')}} </h3></a>
                 </div>
                @include('Site::inc.social')    
            </div>

            <div class="col-12 col-md-4 mbr-fonts-style display-7">
             <div class="title-page">
                 <a href="#"><h3> {{trans('common.contact_us')}} </h3></a>
               </div>               
                            
               <p class="mbr-text align-left mbr-fonts-style display-7">
                     {{trans('common.phone')}} : {{StringHelper::setting()->client_phone}} <br>
                     {{trans('common.email')}} : {{StringHelper::setting()->client_email}} <br>
                     {{trans('common.address')}} : {{StringHelper::setting()->client_address}}
                 </p>
            </div>
            
        </div>
        <div class="footer-lower">            
            <div class="media-container-row mbr-black">
                <div class="col-sm-12 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2017 - {{date('Y',strtotime(now()))}}  <a href="{{url('')}}"> {{ $footer->copy_right }}</a> - All Rights Reserved 
                    </p>
                </div>
              <!--   <div class="col-sm-6" style="text-align: right;">
                    <p class="mbr-text mbr-fonts-style display-7">
                       
                    </p>
                </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
