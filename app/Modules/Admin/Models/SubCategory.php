<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

   protected $table = "sub_category";

 	public function language()
   {
   return $this->belongsTo('App\Language','language_code','code');
	}

	public function category()
   {
   return $this->belongsTo('App\Modules\Admin\Models\Category','category_group_id','group_id');
	}
   
	public function post()
   {
   return $this->hasMany('App\Modules\Admin\Models\Post','sub_category_group_id');
	}
}
