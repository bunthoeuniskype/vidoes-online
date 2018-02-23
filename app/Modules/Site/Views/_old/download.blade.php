@extends('layouts/master_layout_site')

@section('title')
Download Resource | {{$post->title}}
@endsection


@section('content')

<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="padding-top: 100px; padding-bottom: 10px;">

     <div class="container">
       <div class="row">
            <div class="col-md-6">
                <div>
                    <div class="icon-block pb-3">
                      <h4>Contact Us</h4>                        
                    </div>
                    <div class="icon-contacts pb-3" id="contact-download">
                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: {{ $download->client_phone }} <br>
                            Email: {{ $download->client_email }} <br>
                            Address : {{ $download->client_address }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div>
                    <div class="icon-block pb-3">
                      <h4>Download</h4>                        
                    </div>
                    <div class="icon-block pb-3" style="padding-top: 15px; padding-bottom: 15px;">
                      <h6 style="text-decoration: underline; text-align: center;"><i class="mbri-folder mbri-font"></i> {{$post->title}}</h6>                        
                    </div>
                    <div class="icon-contacts pb-3">
                     <?php $link_download = DB::table('link_download')->where(['status'=>1,'post_group_id'=>$post->group_id])->get() ?>
                       @if(count($link_download) > 0)
                       <ul style="list-style: none;">
                       @foreach($link_download as $ld)
                       <li><a href="{{url('download/'.$ld->slug.'/file')}}" target="_blank"><i class="mbri-download mbri-font"></i>  {{$ld->title}}</a></li>               
                       @endforeach
                       </ul>
                       @else
                        <h6 style="text-align: center;"><i class="mbri-opened-folder mbri-font"></i> No File</h6>  
                       @endif
                    
                   
                    </div>
                </div>
            </div>
            </div>
    </div>
    </div>
</section>

@endsection