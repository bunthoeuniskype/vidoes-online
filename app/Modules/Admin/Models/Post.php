<?php

namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

   protected $table = "post";
   
   protected $fillable = ['group_id','category_group_id', 'sub_category_group_id','title','description','content', 'image', 'video_id','post_status','video_type','status', 'created_at', 'created_by','updated_by','updated_at', 'language_code', 'slug',
  'download_type', 'file_type_1','quantity_file_type_1','file_type_2','quantity_file_type_2','author_name','author_photo', 'author_description','price','count_view','rating', 'like','dislike' ];
 
 public function language()
   {
   return $this->belongsTo('App\Language','language_code','code');
 }

 public function category()
   {
   return $this->belongsTo('App\Modules\Admin\Models\Category','category_group_id','group_id');
	}

 public function sub_category()
   {
   return $this->belongsTo('App\Modules\Admin\Models\SubCategory','sub_category_group_id','group_id');
	}
  
    public function comment()
   {
   return $this->hasMany('App\Modules\Site\Models\Comment','post_group_id');
    }

     public function link_download()
   {
   return $this->hasMany('App\Modules\Site\Models\LinkDownload','post_group_id');
    }
}
