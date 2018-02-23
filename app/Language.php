<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
   
   public function category()
   {
   return $this->hasMany('App\Modules\Admin\Models\Category','language_code');
   }
   public function sub_category()
   {
   return $this->hasMany('App\Modules\Admin\Models\SubCategory','language_code');
   }
}
