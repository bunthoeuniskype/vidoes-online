@extends('layouts/master_layout_site')

@section('title')
Contact Us
@endsection


@section('content')

<section class="features3 cid-qwctttc5Hs" id="features17-l" data-rv-view="32" style="padding-top: 100px; padding-bottom: 10px;">
    
     <div class="container">
       <div class="row">
            <div class="col-md-6">
                <div class="google-map">
               {!! $contact->client_map !!}
                </div>
            </div>

            <div class="col-md-6" style="padding-left: 15px;">              
                <div>
                    <div class="icon-block pb-3">
                      <h4>Contact Us</h4>                        
                    </div>
                    <div class="icon-contacts pb-3">
                     @if(Session::has('send'))
                        <div class="alert alert-success">
                        <em>{!! Session('send') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
                        </div>
                     @endif

                        <p class="mbr-text align-left mbr-fonts-style display-7">
                            Phone: {{ $contact->client_phone }} <br>
                            Email: {{ $contact->client_email }} <br>
                            Address : {{ $contact->client_address }}
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    
                    <form class="block mbr-form" action="{{url('feedback')}}" method="post" data-form-title="Mobirise Form">                
                      {{ csrf_field() }}

                            <div class="col-md-6 multi-horizontal" data-for="name" style="  padding-bottom: 1rem;">
                                <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name" required="" id="name-form4-z">
                            </div>
                            
                            <div class="col-md-12" data-for="email" style="padding-bottom: 1rem;">
                                <input type="text" class="form-control input" name="email" data-form-field="Email" placeholder="Email" required="" id="email-form4-z">
                            </div>
                            <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" style="resize:none" id="message-form4-z"></textarea>
                            </div>
                            <div class="input-group-btn col-md-12 pull-right" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-xs btn-primary display-4" style="cursor: pointer;"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span> Send</button>
                            </div>
                      
                    </form>
                </div>
            </div>
    </div>
    </div>
</section>

@endsection