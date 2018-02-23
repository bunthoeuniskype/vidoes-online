<?php namespace App\Modules\Security\Models;

use Illuminate\Database\Eloquent\Model;

class Block_Ip extends Model {

protected $table = "block_ip";

public function user()
{
	return $this->belongsTo('App\User','user_id','id');
}

}
