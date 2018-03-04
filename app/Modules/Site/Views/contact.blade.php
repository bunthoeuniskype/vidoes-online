@extends('Site::layouts/main')

@section('title')
Contact Us
@endsection


@section('content')

       <div class="row" style="margin-left:0px;margin-right: 0px;">

            <div class="col-12 col-lg-6">   
            <div style="overflow: hidden;">
                {!! $contact->client_map !!} 
            </div>          
            </div>

            <div class="col-12 col-lg-6">              
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
                            {{trans('common.phone')}} : {{ $contact->client_phone }} <br>
                            {{trans('common.email')}} : {{ $contact->client_email }} <br>
                            {{trans('common.address')}} : {{ $contact->client_address }}
                        </p>
                    </div>
                </div>
                <div data-form-type="formoid">
                    <div id="contact-app"></div>                 
                </div>
            </div>
    </div>


@endsection