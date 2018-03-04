<?php

namespace App\Modules\Site;
use App\Modules\Security\Models\Setting;
use App\Modules\Admin\Models\Post;
use App;

class StringHelper {

  public static function setting() {  
      return Setting::orderBy('id','desc')->first();
   }

    public static function truncatePage($string, $length = 150,$link = '') {

    $limit = abs((int)$length);
       if(strlen($string) > $limit) {
          $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1 <a href="'.$link.'">Read more</a>', $string);
       }
    return $string;

   }

  public static function truncate($string, $length = 150) {

    $limit = abs((int)$length);
       if(strlen($string) > $limit) {
          $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
       }
    return $string;

   }

    public static function page() {

   	 $posts = Post::where(['language_code'=>App::getLocale(),'status'=>1,'content_type'=>'page'])->orderBy('order','DESC')->get(); 
   	 $out = '';
   	 foreach ($posts as $key => $value) {
   	 		$out .=	'<li>';
            $out .= '<a href="'.url("page/".$value->slug).'">';
            $out .= '<span class="mbri-right mbr-iconfont mbr-iconfont-btn"></span> ';
            $out .= $value->title;
            $out .=  '</a>';
            $out .   '</li>';            
   	 }
   	echo $out; 
   }

   public static function pageQuery($qry) {
     $posts = Post::where(['status'=>1,'content_type'=>'page'])
            ->where('title','like','%'.$qry.'%')->first();
          if(count($posts) > 0){
               $post = Post::where(['language_code'=>App::getLocale(),'group_id'=>$posts->group_id])->first();
               if(count($post) > 0){
                return $post;
               }
            } 
      return false;
   }

}