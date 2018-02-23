<?php

namespace App\Modules\Site\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

   protected $table= "feed_back";
   protected $fillable = ['name','email','message'];

}
