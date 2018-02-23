<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class VideoList extends Model {

   protected $table = "video_list";

 	public function language()
   {
   return $this->belongsTo('App\Language','language_code','code');
	}

	public function post()
   {
   return $this->belongsTo('App\Modules\Admin\Models\Post','post_group_id');
	}
}
