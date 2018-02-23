<?php

namespace App\Modules\Site\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

   protected $table= "comment";

   public function customer()
   {
   return $this->belongsTo('App\Modules\Site\Models\Customer','customer_id','id');
	}
	public function post()
   {
   return $this->belongsTo('App\Modules\Admin\Models\Post','post_group_id','group_id');
	}

}
