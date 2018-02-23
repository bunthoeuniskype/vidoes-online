<?php

function handle($permissions)
  {
    if (auth()->guest() || !auth()->user()->can(explode('|', $permissions))) {
      abort(403);
      }
    return $next($request);
  }

function checkMenu($permissions){

	handle($permissions);
	dd($permissions);

   }


?>