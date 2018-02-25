<?php

namespace App\Modules\Site;
use App\Modules\Admin\Models\Post;
use App;

class StringHelper {

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
}