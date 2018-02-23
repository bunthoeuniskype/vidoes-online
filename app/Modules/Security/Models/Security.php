<?php namespace App\Modules\Security\Models;

use Illuminate\Database\Eloquent\Model;

class Security extends Model {

protected $table = "log_history";

public function user()
{
	return $this->belongsTo('App\User','user_id','id');
}

}
