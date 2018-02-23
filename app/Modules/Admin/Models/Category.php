<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

   protected $table = "category";
 
 public function language()
   {
   return $this->belongsTo('App\Language','language_code','code');
 }

 	public function sub_category()
   {
   return $this->hasMany('App\Modules\Admin\Models\SubCategory','category_group_id');
	}
	public function post()
   {
   return $this->hasMany('App\Modules\Admin\Models\Post','category_group_id');
	}
}
