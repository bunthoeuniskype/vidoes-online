<h5 class="subcategory">Social Profile</h5> 
                 
 <div class="mbr-social-likes social-likes social-likes_visible social-likes_ready" style="display: flex; text-align: center;">  

                    <div style="margin: 0;padding: 0;"> 
                        <div>
                         <a style="color: #fff;" href="{{$social->link_facebook}}" target="_blank"> 
                        <span class="btn btn-social socicon-bg-facebook facebook mx-2" title="Facebook">
                          <i class="socicon socicon-facebook"></i>
                        <span class="social-likes__counter social-likes__counter_facebook social-likes__counter_empty"></span> 
                        </span></a>
                        </div>
                        <div>

                 <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId={{$social->facebook_id}}";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                      
                        </div>
                        </div>

                        <div style="margin: 0; padding: 0;"> 
                        <div>
                        <a style="color: #fff;" href="{{$social->link_youtube}}" target="_blank"> 
                        <span class="btn btn-social youtube socicon-bg-youtube mx-2" title="Youtube">
                           <i class="socicon socicon-youtube"></i>
                        <span class="social-likes__counter social-likes__counter_pinterest social-likes__counter_empty"></span></span></a>
                        <div style="margin-left: 5px;">
                          <script src="https://apis.google.com/js/platform.js"></script>
                       <div class="g-ytsubscribe" data-channelid="{{$social->youtube_id}}" data-layout="default" data-theme="dark" data-count="default"></div>
                        </div>
                        </div></div>

                         <div style=" margin: 0; padding: 0; "> 
                        <div>
                         <a style="color: #fff;" href="{{$social->link_instagram }}" target="_blank">
                        <span class="btn btn-social instagram socicon-bg-instagram mx-2" title="Instagram">
                               <i class="socicon socicon-instagram"></i>
                        <span class="social-likes__counter social-likes__counter_mailru social-likes__counter_empty"></span></span></a>
                        <div>
                            <a href="{{$social->link_instagram}}" target="_blank"> <button style="      color: white; font-size: 12px;border-radius: 3px; border: 1px solid #2e19ff; background-color: #3897f0;padding-right: 7px; padding-left: 7px; cursor: pointer;">Follow</button></a>
                        </div>
                        </div></div>
    </div>
                 
<hr>