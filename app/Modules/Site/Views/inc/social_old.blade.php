<!-- <h5 class="subcategory" style="text-align: center;">Social</h5> -->
                 
 <div class="mbr-social-likes social-likes social-likes_visible social-likes_ready" style="text-align: center;">  
<div class="row">
  <div class="col-4 col-lg-12">
    
       <div style="margin: 0;padding: 0;"> 
                        <div>
                         <a style="color: #fff;" href="{{$social->link_facebook}}" target="_blank"> 
                        <span class="btn btn-social socicon-bg-facebook facebook mx-2" title="Facebook">
                          <i class="socicon socicon-facebook"></i>
                        <span class="social-likes__counter social-likes__counter_facebook social-likes__counter_empty"></span> 
                        </span></a>
                        </div>
                        <div>

                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2F{{$social->facebook_id}}%2F&width=73&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21" width="73" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                      
                        </div>
                        </div>
  </div>
  <div class="col-4 col-lg-12">
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
  </div>
  <div class="col-4 col-lg-12">
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
</div>

 </div>
                 
