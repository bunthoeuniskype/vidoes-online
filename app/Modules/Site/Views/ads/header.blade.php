<div class="row" style="margin-left: 0px; margin-right: 0px;">
<div class="col-md-3">
 @include('Site::inc.logo')
</div>
<div class="col-lg-9">
@if(count($ads_header) > 0)
<img class="img img-responsive" src="{{asset($ads_header->image)}}" style="max-width: 100%; max-height: 118px;width: 100%;">
@endif
</div>
</div>
