<?php use App\Modules\Security\Models\Setting; ?>
<ul class="logo">
	<li>
		<a href="{{ url('') }}">
		 <img class="img img-responsive" src="{{ asset(Setting::getSetting()->logo) }}" media-simple="true"> </a>
	 </li>
</ul>