<?php

namespace App\Modules\Site\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

   protected $table= "customer";
   protected $fillable= ['firstname', 'lastname', 'gender', 'username', 'password', 'confirm_password', 'email', 'phone', 'dob', 'status', 'address', 'image', 'created_by', 'updated_by', 'is_deleted', 'verify'];

   public function comment()
   {
   return $this->hasMany('App\Modules\Site\Models\Comment','customer_id');
	}

}
