<section class="cid-qwcsE0gn1m" id="footer1-j" data-rv-view="35" style="padding-top: 30px;">

    <div class="container">
        <div class="media-container-row content text-white">       
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                   {{ $footer->client_address }}
                </p>
            </div>
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: {{ $footer->client_email }}
                    <br>Phone: {{ $footer->client_phone }}                    
                </p>
            </div>
            <div class="col-12 col-md-4 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Links
                </h5>
                <p class="mbr-text">
                    <a class="text-primary" href="{{  $footer->link_facebook }}" target="_blank">
                      <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Facebook</a>                      
                    <br><a class="text-primary" href="{{  $footer->link_youtube }}" target="_blank">
                      <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Youtube</a>                    
                     <br> <a class="text-primary" href="h{{  $footer->link_instagram }}" target="_blank">
                      <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span> Instagram</a>
                    
                </p>
            </div>
        </div>
        <div class="footer-lower">            
            <div class="media-container-row mbr-black">
                <div class="col-sm-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2017 <a href="{{url('')}}"> {{ $footer->copy_right }}</a> - All Rights Reserved 
                    </p>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <p class="mbr-text mbr-fonts-style display-7">
                        Develop By {{ $footer->develop_by }}
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
